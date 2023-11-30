<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\UserData;

class SoapUserController extends Controller
{

    public function showUsers()
    {
        $users = UserData::select('name', 'email', 'gender', 'dob')->get();

        // Construct XML content
        $xml = new \SimpleXMLElement('<users></users>');

        foreach ($users as $user) {
            $userXML = $xml->addChild('user');
            $userXML->addChild('name', $user->name);
            $userXML->addChild('email', $user->email);
            $userXML->addChild('gender', $user->gender);
            $userXML->addChild('dob', $user->dob);
        }

        // Set response content type to XML
        $content = $xml->asXML();

        return response($content)->header('Content-Type', 'application/xml');
    }

    public function createUser(Request $request)
    {
        // Get the XML data from the request body
        $xmlData = $request->getContent();

        // Parse XML data
        $xml = simplexml_load_string($xmlData);
        
        // Convert SimpleXMLElement to array
        $dataArray = json_decode(json_encode($xml), true);

        // Validate the incoming request data
        $validatedData = Validator::make($dataArray,[
            'name' => 'required|string',
            'email' => 'required|email|unique:user_data,email',
            'gender' => 'required|in:Male,Female,Other',
            'dob' => 'required|date',
        ]);

        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()], 422); 
        }

        // Create a new user using the create method
        $user  = UserData::create([
            'name' => $dataArray['name'],
            'email' => $dataArray['email'],
            'gender' => $dataArray['gender'],
            'dob' => $dataArray['dob'],
        ]);

        // Return a SOAP response indicating success or failure
        if ($user) {
            return response()->soap(['success' => true, 'message' => 'User created successfully']);
        } else {
            return response()->soap(['success' => false, 'message' => 'Failed to create user']);
        }
    }
}
