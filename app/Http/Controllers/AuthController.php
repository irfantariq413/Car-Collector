<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    public function index()
    {
		if(!Auth::check()){
            return view('home');
        }
		return redirect()->route('car.manage');   
    }  
      
	public function login()
    {
		if(!Auth::check()){
            return view('login');
        }
		return redirect()->route('car.manage');   
    } 
	
    public function registration()
    {
		if(!Auth::check()){
            return view('registration');
        }
		return redirect()->route('car.manage');      
    }
   
    public function postLogin(Request $request)
    {
		$input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
			return redirect()->route('car.manage');
        }
		else{
            return redirect()->route('user.login')
                ->with('danger','Email or Password is Wrong.');
        }
    }
      
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);   

        $input = $request->all();

		$input['password'] = Hash::make($input['password']);

		$image = $request->file('img');
        $input['img'] = time().'.'.$image->extension();		
		
		resize_image($image,$input['img']);
		
        $destinationPath = 'public/assets/uploads/o';
        $image->move($destinationPath, $input['img']);
        User::create($input);
        return redirect()->route('user.login');
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }
}
