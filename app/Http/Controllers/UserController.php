<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Initialize GuzzleHTTP client
        $client = new Client([
            'base_uri' => 'https://firestore.googleapis.com/v1/projects/genzee-baddies-1/databases/(default)/documents/
            ',
        ]);

        // Send request to fetch users data
        try {
            $response = $client->get('users');
            $usersData = json_decode($response->getBody()->getContents(), true);

            // Extract users data from the response
            $users = [];

            foreach ($usersData['documents'] as $document) {
                $users[] = $document['fields']; // Assuming users data is stored in fields
            }

            return response()->json($users);
        } catch (\Exception $e) {
            // Handle error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
