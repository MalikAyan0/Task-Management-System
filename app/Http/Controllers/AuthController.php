<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        try {
            return view('auth.login');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong.']);
        }
    }

    /**
     * Handle the login attempt.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }

        return back()->with('error', 'Invalid credentials.');
    }

    /**
     * Redirect Dashboard.
     */



    public function dashboard(Request $request)
    {
        try {

            $totalTasks = Task::count();

            $pendingTasks = Task::where('status', 'Pending')->count();
            $inProgressTasks = Task::where('status', 'In Progress')->count();
            $completedTasks = Task::where('status', 'Completed')->count();

            return view('pages.dashboard', compact('totalTasks', 'pendingTasks', 'inProgressTasks', 'completedTasks', 'token'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong while fetching task data.']);
        }
    }

    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        try {
            return view('auth.registeration-form');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong.']);
        }
    }

    /**
     * Register a new user.
     */

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        try {

            $user = User::create([
                'name' => $request->name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again!');
        }
    }


    /**
     * Logout the user and revoke tokens.
     */
    public function logout()
    {
        try {
            $user = Auth::user();

            Auth::logout();

            return redirect()->route('login.view')->with('success', 'Logged out successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to logout. Please try again!');
        }
    }

    /**
     * Show the change password form.
     */
    public function showChangePasswordForm()
    {
        try {
            return view('pages.setting');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong.']);
        }
    }

    /**
     * Update the user's password.
     */

    public function updatePassword(Request $request)
    {
        $request->validate([
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $user = Auth::user();
            $user->password = Hash::make($request->input('new-password'));
            $user->save();

            return redirect()->route('dashboard')->with('success', 'Password updated successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update password!'])->withInput();
        }
    }
}
