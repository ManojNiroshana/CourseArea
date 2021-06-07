<?php

namespace Database\Seeders;

use App\Models\Course;
use DateTime;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start_date = '2021-06-07';
        $end_date = '2010-08-07';

        $min = strtotime($start_date);
        $max = strtotime($end_date);

        // Generate random number using above bounds
        $val = rand($min, $max);
        $weeks = rand(1, 52);
        $week1 = rand(1, 52);
        $week2 = rand(1, 52);
        $week3 = rand(1, 52);

        // Convert back to desired date format
        $date1 = new DateTime(date('Y-m-d', $val));
        $date2 = $date1->modify('+' . $weeks . ' weeks');
        $date3 = $date1->modify('+' . $week1 . ' weeks');
        $date4 = $date1->modify('+' . $week2 . ' weeks');
        $date5 = $date1->modify('+' . $week3 . ' weeks');

        $courses = [
            0 => [
                'title' => 'Google Data Analytics Professional Certificate',
                'description' => 'Prepare for an entry-level job as a data analyst. In this program, you’ll learn how to collect, transform, and organize data in order to help draw new insights and make informed business decisions.
                This is for you if you enjoy working with numbers, uncovering trends, and visualizations.',
                'date' => $date1,
                'time' => now(),
            ],
            1 => [
                'title' => 'Google Project Management Professional Certificate',
                'description' => 'Prepare for an entry-level job as a project manager. In this program, you’ll learn how project managers successfully start, plan, and execute a project using both traditional and agile project management approaches.
                This is for you if you enjoy solving problems, working with people, and organization.',
                'date' => $date2,
                'time' => now(),
            ],
            2 => [
                'title' => 'Google UX Design Professional Certificate',
                'description' => 'Prepare for an entry-level job as a UX designer. In this program, you’ll learn the foundations of UX design, how to conduct user research, and design prototypes in tools like Figma and Adobe XD.
                This is for you if you enjoy thinking creatively, design, and research.',
                'date' => $date3,
                'time' => now(),
            ],
            3 => [
                'title' => 'Google IT Support Professional Certificate',
                'description' => 'Prepare for an entry-level job as an IT support specialist. In this program, you’ll learn the fundamentals of operating systems and networking, and how to troubleshoot problems using code to ensure computers run correctly.
                This is for you if you enjoy solving problems, learning new tools, and helping others.',
                'date' => $date4,
                'time' => now(),
            ],
            3 => [
                'title' => 'Google IT Automation Professional Certificate',
                'description' => 'This is an advanced program for learners who have completed the Google IT Support Professional Certificate.
                This is for you if you want to build on your IT skills with Python and automation.',
                'date' => $date5,
                'time' => now(),
            ]
        ];
        foreach ($courses as $course) {
            Course::create([
                'title' => $course['title'],
                'description' => $course['description'],
                'date' => $course['date'],
                'time' => $course['time'],
            ]);
        }
    }
}
