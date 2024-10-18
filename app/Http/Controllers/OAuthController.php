<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OAuthController extends Controller
{
    public function handleZoomCallback(Request $request)
    {
        // Get the 'code' from Zoom's callback
        $authorizationCode = $request->query('code');

        // Exchange the authorization code for an access token
        $client = new Client();
        $response = $client->post('https://zoom.us/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $authorizationCode,
                'redirect_uri' => 'http://zign.test/oauth/callback', // Ensure this matches Zoom settings
                'client_id' => env('ZOOM_CLIENT_ID'), // Ensure these are correct
                'client_secret' => env('ZOOM_CLIENT_SECRET'),
            ],
        ]);

        $responseBody = json_decode($response->getBody()->getContents(), true);

        // Get the access token from Zoom response
        $accessToken = $responseBody['access_token'];

        // You can now use the access token to interact with Zoom API on behalf of the user
        return response()->json([
            'access_token' => $accessToken
        ]);
    }
}