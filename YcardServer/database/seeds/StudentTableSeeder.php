<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Student::create([
          'sname' => '이진아',
          'image' => '진아.jpg',
          'snum' => '1501237',
          'dname' => 'computer',
          'date' => '2017-04-23'
        ]);
        App\Student::create([
          'sname' => '조규승',
          'image' => '규승.jpg',
          'snum' => '1701923',
          'dname' => 'computer',
          'date' => '2017-04-23'
        ]);
        App\Student::create([
          'sname' => '박성원',
          'image' => '성원.jpg',
          'snum' => '1201116',
          'dname' => 'computer',
          'date' => '2017-04-23'
        ]);
        App\Student::create([
          'sname' => '김선중',
          'image' => '선중.jpg',
          'snum' => '1301041',
          'dname' => 'computer',
          'date' => '2017-04-23'
        ]);
        App\Student::create([
          'sname' => '권유성',
          'image' => '유성.jpg',
          'snum' => '1301016',
          'dname' => 'computer',
          'date' => '2017-04-23'
        ]);
        App\Student::create([
          'sname' => '정연제',
          'image' => '연제.jpg',
          'snum' => '1301254',
          'dname' => 'computer',
          'date' => '2017-04-23'
        ]);

    }
}
