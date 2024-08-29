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
    public function index(Request $request)
    {
        if(!$this->verifyToken($request)) {
            return redirect()->route('login');
        }

        $user = $request->user;
        $api_token = $request->api_token;

        if(!$user->admin)
        {
            return view('memberdashboard', compact('user', 'api_token'));  
        }

        $users = User::all();

        return view('dashboard', compact('users', 'user', 'api_token')); 
    }

    public function createUserView(Request $request)
    {

        if(!$this->verifyToken($request)){
            return redirect()->route('login');
        }

        $user = $request->user;
        $api_token=$request->get('api_token'); 

        return view('createuser', compact('user', 'api_token') );
    }
  
    public function store(Request $request) {
    
        if(!$this->verifyToken($request)){
            return redirect()->route('login');
        }

        $user = $request->user;
        $api_token = $request->api_token; 

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
        return redirect()->route('dashboard', ['api_token' => $api_token])->with('success', 'User created Successfully');
    }

    public function show($id)
    {
        $user = User::findOrFail($id); // Retrieve the user by ID
        return view('users.show', compact('user')); // Pass user data to the view
    }

    public function edit(Request $request, $id)
    {
        if(!$this->verifyToken($request)) {
            return redirect()->route('login');
        }

        $user = $request->user;
        $api_token = $request->api_token;

        $user_edit = User::findOrFail($id); 
        return view('usersedit', compact('user_edit', 'api_token', 'user'));
    }

    public function update(Request $request, $id)
    {
        if(!$this->verifyToken($request)){
            return redirect()->route('login');
        }

        $user = $request->user;
        $api_token = $request->api_token; 

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

        return redirect()->route('dashboard', ['api_token' => $api_token])->with('success', 'User updated successfully.'); // Redirect with success message
    }

    public function destroy(Request $request, $id)
    {
        if(!$this->verifyToken($request)){
            return redirect()->route('login');
        }

        $api_token = $request->api_token; 

        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('dashboard', ['api_token' => $api_token])->with('success', 'User deleted successfully.');
    }

    public function loginView(): View
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
    
        // find user by email
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()
                             ->withErrors(["email" => "These credentials do not match our records."])
                             ->withInput();
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
            return redirect('/?api_token='.$api_token);
        } else {
            return redirect()->back()
                             ->withErrors(["email" => "These credentials do not match our records."])
                             ->withInput();
        }
    }
// log out / verifica tgoken y te lleva a login 
    public function logoutSubmit(Request $request)
    {
        if(!$this->verifyToken($request)) {
            return redirect()->route('login');
        }

        $user = $request->user;
// aca es para actulizar la base de datos. al hacer logout borra el api token 
        $user->api_token = null;
        $user->save();

        return redirect()->route('login');
    }

    public function eventsView(Request $request)
    {
        if(!$this->verifyToken($request)) {
            return redirect()->route('login');
        }

        $user = $request->user;
        $api_token = $request->api_token;

        return view('events', compact('user', 'api_token')); 
    }

    public function aboutusView(Request $request)
    {
        if(!$this->verifyToken($request)) {
            return redirect()->route('login');
        }

        $user = $request->user;
        $api_token = $request->api_token;

        return view('aboutus', compact('user', 'api_token')); 
    }
// aca es para verificar que existe el token. va a estar en todos los metodos 
    public function verifyToken (Request $request)
    {
        $api_token=$request->get('api_token'); 

        if ($api_token) {
            $tokenParts = explode('|', base64_decode($api_token));

            $userId = $tokenParts[0];

            $user = User::find($userId);
// si el usuario se logueo, se guarda el usuario en el objeto $request  
            if ($user['api_token'] == $api_token){
                $request->user = $user;
                $request->api_token = $api_token;
                return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }
}