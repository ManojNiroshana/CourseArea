<?php

namespace App\Http\Controllers;

use App\Models\AssignedCourse;
use App\Models\Course;
use App\Models\CourseRegistry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_course()
    {
        return view('content.course.add_course');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_course(Request $request)
    {
        DB::beginTransaction();
        try {
            $course =  Course::create([
                'title' => $request->course_title,
                'description' => $request->course_description,
                'date' => $request->course_date,
                'time' => $request->course_time,
            ]);
            DB::commit();
            return redirect('/add-course')->with('success', 'Course Added Success!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/add-course')->with('error', 'Course Adding Failed!');
            // something went wrong
        }
    }

    public function view_courses(Request $request)
    {
        if (Auth::user()->u_tp_id == 1) {
            $courses = Course::all();
        } else {
            $courses = Course::leftJoin('assigned_courses', 'assigned_courses.course_id', 'courses.course_id')
                ->where('assigned_courses.u_id', Auth::user()->id)
                ->get(['courses.title', 'courses.description', 'courses.date', 'courses.time', 'courses.course_id']);
        }
        return view('content.course.view_courses', compact('courses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function assign_course(Request $request)
    {

        $students = User::where('u_tp_id', 2)->get(['name', 'id', 'email']);
        $courses = Course::all();
        return view('content.course.assign_courses', compact('students', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function save_assign_course(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->courses as $course) {
                $assigned_course = AssignedCourse::where('u_id', $request->student_id)->where('course_id', $course)->count();
                if ($assigned_course == 0) {
                    AssignedCourse::create([
                        'u_id' => $request->student_id,
                        'course_id' => $course,
                    ]);
                }
            }
            DB::commit();
            return redirect('/assign-course')->with('success', 'Course Assgned Success!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/assign-course')->with('error', 'Course Assgned Failed!');
            // something went wrong
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function enroll_course(Request $request)
    {
        $course_id = $request->id;
        $u_id = Auth::user()->id;
        $assigned_course = AssignedCourse::where('u_id', $u_id)->where('course_id', $course_id)->first();
        if (!$assigned_course) {
            abort(401);
        } else {
            CourseRegistry::create([
                'u_id' => $u_id,
                'course_id' => $course_id,
            ]);

            return view('content.course.enroll_course');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
