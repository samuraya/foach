<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Helpers\Tokenizer;

class RegisterController extends Controller
{
    public function index()
    {
        //calling Laravel macro and passing component name
        return View::component('SignUp');      
    }    

    public function register(Request $request)
    {
    	$validated = $this->validate($request, [
            'first_name'   => 'required|min:2|max:12',
            'last_name'    => 'required|min:2|max:12',
            'amount' => 'required|integer',
            'email' => 'required|email',
            'phone'  => 'required|numeric',
            'password' => 'required|min:8'

        ]);

    	$user = User::create($validated);
    	
    	return response()->json([
            'status' => 'OK'           
        ]);
        

    }
    
}
