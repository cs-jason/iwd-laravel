<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function markLessonAsComplete(Request $request, $lessonId)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // Retrieve the user ID for the current session
            $userId = Auth::id();

            // Update or create progress in the database
            Progress::updateOrCreate(
                ['user_id' => $userId, 'lesson_id' => $lessonId],
                ['progress_percentage' => 100]
            );

            $request->session()->flash('success', 'You have completed this lesson');

            return redirect()->back(); // Redirect back to the referring page (Lesson 1 in this case)
        } else {
            return response()->json(['message' => 'Please log in to complete the lesson'], 401);
        }
    }

    // public function showLesson1()
    // {
    //     // You can pass any required data to the lesson view, such as the progress for Lesson 1
    //     // For demonstration purposes, I'll pass a dummy progress percentage.
    //     // $progress1 = 50; // Replace this with the actual progress value fetched from the database.

    //     // return view('lesson1', compact('progress1'));
    //     return view('lesson1');
    // }
    
    public function showLesson1()
    {
        return view('lesson1');
    }
    
    public function showLesson2()
    {
        return view('lesson2');
    }
    
    public function showLesson3()
    {
        return view('lesson3');
    }
    
    public function showLesson4()
    {
        return view('lesson4');
    }
    
    public function showLesson5()
    {
        return view('lesson5');
    }
    
    public function showLesson6()
    {
        return view('lesson6');
    }
}
