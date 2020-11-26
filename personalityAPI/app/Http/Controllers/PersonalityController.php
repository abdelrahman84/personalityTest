<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Question;
use App\User;

class PersonalityController extends Controller
{
    public function getQuestions()
    {
        $questions = DB::table('questions')->get();
        return response()->json([
            "Questions" => $questions
        ]);
    }

    public function getPersonalityScore(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
        return response()->json([
        "Message" => 'user already exits, please login to see results'
        ], 400);
        }
        $E = 0;
        $I = 0;
        $S = 0;
        $N = 0;
        $T = 0;
        $F = 0;
        $J = 0;
        $P = 0;
        $answers = $request->answers;
        foreach ($answers as $answer) {
            $question = Question::find($answer['question_id']);
            switch ($question->meaning) {

                case 'E';
                $E += ($answer['score'] -4);
                break;

                case 'I';
                $I += ($answer['score'] -4);
                break;

                case 'S';
                $S += ($answer['score'] -4);
                break;

                case 'N';
                $N += ($answer['score'] -4);
                break;

                case 'T';
                $T += ($answer['score'] -4);
                break;

                case 'F';
                $F += ($answer['score'] -4);
                break;

                case 'J';
                $J += ($answer['score'] -4);
                break;

                case 'P';
                $P += ($answer['score'] -4);
                break;
            }

            $personality = ($E > $I || $E == $I ? 'E' : 'I') .''.($S > $N || $S == $N ? 'S' : 'N')
            .''.($T > $F || $T == $F ? 'T' : 'F') .''.($J > $P || $J == $P ? 'J' : 'P');
        }
        $user = new User();
        $user->email = $request->email;
        $user->personality = $personality;
        $user->save();

        return  response()->json($personality);
    }
}
