<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalityController extends Controller
{
    public function getQuestions()
    {
        $questions = DB::table('questions')->get();
        return response()->json([
            "Questions" => $questions
        ]);
    }
}
