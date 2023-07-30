<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('/register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        Auth::logout(); 

        return redirect('/')->with('success', 'You have been logged out.');
    }
    
    public function showDashboard()
    {
        $userId = Auth::id();
    
        $progress1 = Progress::where('user_id', $userId)
                             ->where('lesson_id', 1)
                             ->value('progress_percentage');
                             
        $progress2 = Progress::where('user_id', $userId)
                             ->where('lesson_id', 2)
                             ->value('progress_percentage');

        $progress3 = Progress::where('user_id', $userId)
                             ->where('lesson_id', 3)
                             ->value('progress_percentage');

        $progress4 = Progress::where('user_id', $userId)
                             ->where('lesson_id', 4)
                             ->value('progress_percentage');

        $progress5 = Progress::where('user_id', $userId)
                             ->where('lesson_id', 5)
                             ->value('progress_percentage');

        $progress6 = Progress::where('user_id', $userId)
                             ->where('lesson_id', 6)
                             ->value('progress_percentage');

        $score1 = Progress::where('user_id', $userId)
                             ->where('lesson_id', 1)
                             ->value('score_percentage');
                             
        $score2 = Progress::where('user_id', $userId)
                             ->where('lesson_id', 2)
                             ->value('score_percentage');

        $score3 = Progress::where('user_id', $userId)
                             ->where('lesson_id', 3)
                             ->value('score_percentage');

        $score4 = Progress::where('user_id', $userId)
                             ->where('lesson_id', 4)
                             ->value('score_percentage');

        $score5 = Progress::where('user_id', $userId)
                             ->where('lesson_id', 5)
                             ->value('score_percentage');

        $score6 = Progress::where('user_id', $userId)
                             ->where('lesson_id', 6)
                             ->value('score_percentage');

        $notificationStatus = User::where('id', $userId)
                             ->value('notifications');
        
        return view('/dashboard', compact('progress1', 'progress2', 'progress3', 'progress4', 'progress5', 'progress6', 'score1', 'score2', 'score3', 'score4', 'score5', 'score6', 'notificationStatus'));
    }

    public function checkLessonComplete($lessonId)
    {
        // Retrieve the user ID for the current session
        $userId = Auth::id();

        // Check if the user has 100 progress_percentage for the lesson
        $progress = Progress::where('user_id', $userId)
            ->where('lesson_id', $lessonId)
            ->first();

        if (!$progress || $progress->progress_percentage != 100) {
            return false; 
        }
        return true;
    }

    public function checkQuizComplete($lessonId)
    {
        // Retrieve the user ID for the current session
        $userId = Auth::id();

        // Check if the user has 100 progress_percentage for the lesson
        $score = Progress::where('user_id', $userId)
            ->where('lesson_id', $lessonId)
            ->first();

        if (!$score || $score->score_percentage != 100) {
            return false; 
        }
        return true;
    }

    public function checkUserComplete()
    {
        // Retrieve the user ID for the current session
        $userId = Auth::id();

        // Check if the user has 100 score_percentage for lesson_id 1 to 6
        $lessons = range(1, 6); // Create an array of lesson IDs from 1 to 6
        foreach ($lessons as $lessonId) {
            $progress = Progress::where('user_id', $userId)
                ->where('lesson_id', $lessonId)
                ->first();

            if (!$progress || $progress->score_percentage != 100) {
                return false; 
            }
        }
        return true;
    }


    public function showCertificate()
    {
        return view('certificate');
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json(['user' => $user]);
    }

    public function updateNotificationStatus() {
        if (Auth::check()) {
            $userId = Auth::id(); // Get the ID of the currently authenticated user
            $user = User::find($userId); // Retrieve the User model using the user ID
    
            if ($user) {
                $notifications = $user->notifications;
                $notifications = !$notifications; // Use the NOT operator to toggle the notifications status
                $user->notifications = $notifications;
                $user->save();
            } else {
                // Handle the case when the user is not found (optional)
                // For example, log an error or return an error response.
                return response()->json(['error' => 'User not found'], 404);
            }
    
            return redirect()->back();
        }
    }

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


    // settings functions
    public function showSettingsForm()
    {
        $userId = Auth::id();

        $notificationStatus = User::where('id', $userId)
                             ->value('notifications');

        return view('settings', compact('userId', 'notificationStatus'));
    }

    public function updateSettings(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        return redirect()->back()->with('success', 'Account updated successfully.');
    }

    // ...

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($validatedData['new_password']),
        ]);

        return redirect()->back()->with('success', 'Password changed successfully.');
    }

    public function resetProgress(Request $request)
    {
        $userId = auth()->id();

        // Set all progress_percentage and score_percentage to 0 for the user
        Progress::where('user_id', $userId)->update([
            'progress_percentage' => 0,
            'score_percentage' => 0,
        ]);

        return redirect()->back()->with('success', 'Progress has been reset.');
    }

    public function deleteAccount(Request $request)
    {
        $user = auth()->user();
        
        // Perform any additional cleanup or related actions before deleting the account
        // ...

        $user->delete();

        // You may also choose to log out the user after deleting their account
        // Auth::logout();

        return redirect('/')->with('success', 'Account deleted successfully.');
    }


    public function adminCompleteAll()
    {
        // Retrieve the user ID for the current session
        $userId = Auth::id();
    
        // Check if the user is logged in
        if (Auth::check()) {
            // Update progress_percentage and score_percentage to 100 for lesson_id 1 to 6
            $lessons = range(1, 6); // Create an array of lesson IDs from 1 to 6
            foreach ($lessons as $lessonId) {
                Progress::updateOrCreate(
                    ['user_id' => $userId, 'lesson_id' => $lessonId],
                    ['progress_percentage' => 100, 'score_percentage' => 100]
                );
            }
      
            // Redirect back to the dashboard or any other desired page
            return redirect('/');
        } else {
            return response()->json(['message' => 'Please log in to update progress'], 401);
        }
    }
}

