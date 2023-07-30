<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function submitQuiz(Request $request, $lessonId)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // Retrieve the user ID for the current session
            $userId = Auth::id();        

            // Retrieve the quiz score from the request
            $score = $request->input('value');
            // dd($score);
            Progress::updateOrCreate(
                ['user_id' => $userId, 'lesson_id' => $lessonId],
                ['score_percentage' => $score],
            );

            $request->session()->flash('success', 'Quiz submitted successfully!');
            // return redirect()->route('quiz.results')->with('success', 'Quiz submitted successfully!');

            // Process the score as needed (e.g., save it to the database)

            // Redirect the user to the quiz results page with the success message
            return redirect()->back(); // Redirect back to the referring page (Lesson 1 in this case)
        } else {
            return response()->json(['message' => 'Please log in to complete the lesson'], 401);
        }        
    }

    public function showQuiz1()
    {
        return view('quiz1');
    }
    
    public function showQuiz2()
    {
        return view('quiz2');
    }
    
    public function showQuiz3()
    {
        return view('quiz3');
    }
    
    public function showQuiz4()
    {
        return view('quiz4');
    }
    
    public function showQuiz5()
    {
        return view('quiz5');
    }
    
    public function showQuiz6()
    {
        return view('quiz6');
    }

    public function showSolution1()
    {
        $userId = Auth::id();
        
        $score1 = Progress::where('user_id', $userId)
                            ->where('lesson_id', 1)
                            ->value('score_percentage');

        return view('/solution1', compact('score1'));
    }

    public function showSolution2()
    {
        $userId = Auth::id();
        
        $score2 = Progress::where('user_id', $userId)
                            ->where('lesson_id', 2)
                            ->value('score_percentage');

        return view('/solution2', compact('score2'));
    }

    public function showSolution3()
    {
        $userId = Auth::id();
        
        $score3 = Progress::where('user_id', $userId)
                            ->where('lesson_id', 3)
                            ->value('score_percentage');

        return view('/solution3', compact('score3'));
    }

    public function showSolution4()
    {
        $userId = Auth::id();
        
        $score4 = Progress::where('user_id', $userId)
                            ->where('lesson_id', 4)
                            ->value('score_percentage');

        return view('/solution4', compact('score4'));
    }

    public function showSolution5()
    {
        $userId = Auth::id();
        
        $score5 = Progress::where('user_id', $userId)
                            ->where('lesson_id', 5)
                            ->value('score_percentage');

        return view('/solution5', compact('score5'));
    }

    public function showSolution6()
    {
        $userId = Auth::id();
        
        $score6 = Progress::where('user_id', $userId)
                            ->where('lesson_id', 6)
                            ->value('score_percentage');

        return view('/solution6', compact('score6'));
    }
}



// $score2 = Progress::where('user_id', $userId)
// ->where('lesson_id', 2)
// ->value('score_percentage');

// $score3 = Progress::where('user_id', $userId)
// ->where('lesson_id', 3)
// ->value('score_percentage');

// $score4 = Progress::where('user_id', $userId)
// ->where('lesson_id', 4)
// ->value('score_percentage');

// $score5 = Progress::where('user_id', $userId)
// ->where('lesson_id', 5)
// ->value('score_percentage');

// $score6 = Progress::where('user_id', $userId)
// ->where('lesson_id', 6)
// ->value('score_percentage');
