<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if(empty($email) or empty($password)){
            return response()->json(['status' => 'error', 'message'=> 'You must fill all fields']);
        }

        $client = new Client();

        try {
            return $client->post('http://127.0.0.1:8000/v1/oauth/token', [
                "form_params" => [
                    "client_secret" => "VB5sr7cO6iYTzL4jRxQtTH5vkxV7hsWvQZGExv54",
                    "grant_type" => "password",
                    "client_id" => 2,
                    "username" => $request->email,
                    "password" => $request->password
                ]
            ]);
        } catch (BadResponseException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
