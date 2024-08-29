<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        // Redirect based on user role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard'); // Admin dashboard route
        } else {
            return redirect()->route('user.dashboard'); // User dashboard route
        }
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
    
        // find user by email
        $user = User::where('email', $email)->first();

        if (!$user) {
            return "invalid Email";
        }

        // verify password
        if (Hash::check($password, $user->password)) {
            // Generate the API token
            $api_token = base64_encode($user->id . '|' . time());
            
            // Update the user's api_token
            $user->api_token = $api_token;
            $user->save();
        
            // Retrieve all users
            $users = User::where('admin', 0)->get();
        
            // Pass the users and api_token to the view
            // Pass user that is the authenticated user.
            return view('dashboard', compact('users', 'api_token', 'user'));
        } else {
            return "Invalid password";
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Auth::guard('web')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return redirect('/');
    }
}
