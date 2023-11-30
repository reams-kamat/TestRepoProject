<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserData;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        // Validate the incoming request data
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:user_data,email',
            'gender' => 'required|in:Male,Female,Other',
            'dob' => 'required|date',
        ]);

        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()], 422); 
        }

        // Create a new user using the create method
        UserData::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'dob' => $request->dob,
        ]);

        return response()->json(['message' => 'User created successfully'], 200);
    }

    public function showUsers()
    {
        // Logic to fetch list of users
        $users = UserData::all();

        return response()->json(['users' => $users], 200);
    }

}
