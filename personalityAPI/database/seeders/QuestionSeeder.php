<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'content' => 'You find it takes effort to introduce yourself to other people.',
            'dimension' => 'EI',
            'meaning' => 'I'
        ]);

        DB::table('questions')->insert([
            'content' => 'You consider yourself more practical than creative.',
            'dimension' => 'SN',
            'meaning' => 'S'
        ]);

        DB::table('questions')->insert([
            'content' => 'Winning a debate matters less to you than making sure no one gets upset.',
            'dimension' => 'TF',
            'meaning' => 'F'
        ]);

        DB::table('questions')->insert([
            'content' => 'You get energized going to social events that involve many interactions.',
            'dimension' => 'EI',
            'meaning' => 'E'
        ]);

        DB::table('questions')->insert([
            'content' => 'You often spend time exploring unrealistic and impractical yet intriguing ideas.',
            'dimension' => 'SN',
            'meaning' => 'N'
        ]);

        DB::table('questions')->insert([
            'content' => 'Deadlines seem to you to be of relative rather than absolute importance.',
            'dimension' => 'JP',
            'meaning' => 'P'
        ]);

        DB::table('questions')->insert([
            'content' => 'Logic is usually more important than heart when it comes to making important decisions.',
            'dimension' => 'TF',
            'meaning' => 'T'
        ]);

        DB::table('questions')->insert([
            'content' => 'Your home and work environments are quite tidy.',
            'dimension' => 'JP',
            'meaning' => 'J'
        ]);

        DB::table('questions')->insert([
            'content' => 'You do not mind being at the center of attention.',
            'dimension' => 'EI',
            'meaning' => 'E'
        ]);

        DB::table('questions')->insert([
            'content' => 'Keeping your options open is more important than having a to-do list.',
            'dimension' => 'JP',
            'meaning' => 'P'
        ]);
    }
}
