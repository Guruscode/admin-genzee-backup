<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory; // Use correct namespace
use Kreait\Firebase\ServiceAccount;



class FirebaseController extends Controller
{


    public function index()
    {
        $factory = (new Factory)
            ->withServiceAccount([
                'type' => env('FIREBASE_TYPE'),
                'project_id' => env('FIREBASE_PROJECT_ID'),
                'private_key_id' => env('FIREBASE_PRIVATE_KEY_ID'),
                'private_key' => str_replace('\n', "\n", env('FIREBASE_PRIVATE_KEY')),
                'client_email' => env('FIREBASE_CLIENT_EMAIL'),
                'client_id' => env('FIREBASE_CLIENT_ID'),
                'auth_uri' => env('FIREBASE_AUTH_URI'),
                'token_uri' => env('FIREBASE_TOKEN_URI'),
                'auth_provider_x509_cert_url' => env('FIREBASE_AUTH_PROVIDER_X509_CERT_URL'),
                'client_x509_cert_url' => env('FIREBASE_CLIENT_X509_CERT_URL'),
            ]);

            $firestore = $factory->createFirestore();

               // Get Firestore database instance
               $database = $firestore->database();

               // Reference the "users" collection
               $usersCollection = $database->collection('users');
       
               // Get all documents within the "users" collection
               $documents = $usersCollection->documents();
       
               // Initialize an empty array to store user data
               $usersData = [];
       
               // Iterate over the documents and store the data in the array
               foreach ($documents as $document) {
                   // Get the document data
                   $userData = $document->data();
       
                   // Append the user data to the array
                   $usersData[] = $userData;
               }
       
               // Pass user data to the view and render the view
               return view('admin.users.users', ['usersData' => $usersData]);
    }
    
}
