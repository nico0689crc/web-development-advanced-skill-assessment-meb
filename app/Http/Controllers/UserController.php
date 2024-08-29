<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function createUserView(Request $request)
    {

        if(!$this->islogedIn($request)){
            return "not logged in";
        }

        $user = $request->user;
        $api_token=$request->get('api_token'); 

        return view('createuser', compact('user', 'api_token') );
    }

  
    public function store(Request $request) {
        // user::create($user);
    
        $user = User::create([
            'first_name'=> $request->first_name,
            'last_name' =>$request->last_name,
            'email' =>$request->email,
            'age' =>$request->age,
            'address' =>$request->address, 
            'password' =>Hash::make($request->password),
            'phone' =>$request->phone, 
            'prof_summary' =>$request->professional_summary   

        ]);
        return redirect()->route('dashboard')->with('success', 'User created Successfully');
        

    }

    public function index()
    {
        $user = auth()->user();
        if(!$user->admin)
        {
        return view('profile.userdashboard', compact('user'));  
        }
        $users = User::all();
        return view('dashboard', compact('users')); 
    }

    public function show($id)
    {
        $user = User::findOrFail($id); // Retrieve the user by ID
        return view('users.show', compact('user')); // Pass user data to the view
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Retrieve the user by ID
        return view('usersedit', compact('user')); // Pass user data to the edit view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'age' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'prof_summary' => 'required|string|max:255',
        ]);
        $user = User::findOrFail($id); // Find the user
        $user->first_name = $request->first_name; // Update user name
        $user->last_name = $request->last_name; // Update user email
        $user->email = $request->email;
        $user->age = $request->age;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->prof_summary = $request->prof_summary;
        $user->save(); // Save changes

        return redirect()->route('users.index')->with('success', 'User updated successfully.'); // Redirect with success message
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function islogedIn (Request $request){
        $api_token=$request->get('api_token'); 

        if ($api_token){
            $tokenParts = explode('|', base64_decode($api_token));

            $userId = $tokenParts[0];

            // fins the user by ID
            $user = User::find($userId);

            if ($user['api_token']!=null){
                $request->user = $user;
                return true;
            }else{
                return false;
            }
        }
    }
}