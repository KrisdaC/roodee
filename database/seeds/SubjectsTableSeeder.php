<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = array(
			array(
				'name' => 'English'
			),

			array(
				'name' => 'English II'
			),

			array(
				'name' => 'Physics'
			),

			array(
				'name' => 'Chemistry'
			),

			array(
				'name' => 'Calculus'
			)
		);

		DB::table('subjects')->insert($subject);
    }
}
