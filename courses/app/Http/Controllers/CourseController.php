<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\File;
use App\Models\Video;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getCourses(){
        $courses = Course::select('id', 'NAME')->get();
        return view('courses')->with('courses', $courses);
    }

    public function addCourse(Request $r){
        $course = new Course();
        $course->NAME = $r->coursename;
        $course->save();
        return redirect('/');
    }

    public function getContent($id){
        $courseInfo = Course::select('id', 'NAME')->where('id', $id)->first();
        $files = File::select('FILE_NAME')->where('COURSE_ID', $id)->get();
        $videos = Video::select('VIDEO')->where('COURSE_ID', $id)->get();
        return view('course-content')->with('files', $files)->with('videos', $videos)->with('courseInfo', $courseInfo); 
    }

    public function addFile(Request $r){
        $file = new File();
        $file->COURSE_ID = $r->id;
        $r->file('file-input')->storeAs('public/files', $r->file('file-input')->getClientOriginalName());
        $file->FILE_NAME = $r->file('file-input')->getClientOriginalName();
        $file->save();
        return redirect('/course'.'/'.$r->id);
    }

    public function addVideo(Request $r){
        $video = new Video();
        $video->COURSE_ID = $r->id;
        $video->VIDEO = $r->videoinput;
        $video->save();
        return redirect('/course'.'/'.$r->id);
    }
}
