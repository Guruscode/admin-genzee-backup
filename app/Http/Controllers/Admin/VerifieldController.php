<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use App\Http\Controllers\Controller;


class VerifieldController extends Controller
{


    public function dashboard() {
        // Initialize GuzzleHTTP client
        $client = new Client([
            'base_uri' => 'https://firestore.googleapis.com/v1/projects/genzee-baddies-1/databases/(default)/documents/',
        ]);
    
        try {
            // Fetch complaints data
            $responseComplaints = $client->get('complaints');
            $complaintsData = json_decode($responseComplaints->getBody()->getContents(), true);
    
            $totalComplains = count($complaintsData['documents']);
    
            // Fetch stickers data
            $responseStickers = $client->get('stickers');
            $stickersData = json_decode($responseStickers->getBody()->getContents(), true);
    
            $totalStickers = count($stickersData['documents']);
    
            // Fetch users data
            $responseUsers = $client->get('users');
            $usersData = json_decode($responseUsers->getBody()->getContents(), true);
    
            $totalPhoto = 0; // Initialize total photo count
            $totalPaidUsers = 0; // Initialize total paid users count
    
            // Iterate over each user document
            foreach ($usersData['documents'] as $user) {
                // Check if the user has a profileImage field and it's not empty
                if (isset($user['fields']['profileImage']) && !empty($user['fields']['profileImage'])) {
                    $totalPhoto++; // Increment total photo count
                }
    
                // Check if the user is paid
                if (isset($user['fields']['paid']) && $user['fields']['paid'] == true) {
                    $totalPaidUsers++; // Increment total paid users count
                }
            }
    
            // Total users count
            $totalUsers = count($usersData['documents']);
    
            return view('dashboard', compact('totalPhoto', 'totalStickers', 'totalUsers', 'totalComplains', 'totalPaidUsers'));
        } catch (\Exception $e) {
            // Handle error
            // You can log the error for debugging purposes
            // Log::error($e->getMessage());
            // Redirect back to the dashboard with error message
            return redirect()->route('dashboard')->with('error', 'Failed to fetch data. Please try again.');
        }
    }
    public function home() {
        return view('welcome');
    }
    public function about() {
        return view('about');
    }

    public function price() {
        return view('pricing');
    }
    public function index()
    {
        // Get the path to the JSON file
        $firebaseCredentialsFile = storage_path('app/genzee-baddies.json');
       
        if (!file_exists($firebaseCredentialsFile)) {
            throw new \Exception('Firebase credentials file not found');
        }

        // Load Firebase credentials from the JSON file
        $serviceAccount = json_decode(file_get_contents($firebaseCredentialsFile), true);
        // Create Firebase Factory with loaded credentials
        $factory = (new Factory)
            ->withServiceAccount($serviceAccount);
        
        $firestore = $factory->createFirestore();
        // Get Firestore database instance
        $database = $firestore->database();
        // Reference the "users" collection
        $usersCollection = $database->collection('users');
        
        // Query users where paid is true
        $query = $usersCollection->where('paid', '=', true)->documents();
        
        // Initialize an empty array to store user data
        $usersData = [];
        // Iterate over the documents and store the data in the array
        foreach ($query as $document) {
            // Get the document data
            $userData = $document->data();
            // Append the user data to the array
            $usersData[] = $userData;
        }

        // Pass user data to the view and render the view
        return view('admin.verifield.index', ['usersData' => $usersData]);
    }

    public function edit($id)
    {
        // Get the path to the JSON file
        $firebaseCredentialsFile = storage_path('app/genzee-baddies.json');
       
        if (!file_exists($firebaseCredentialsFile)) {
            throw new \Exception('Firebase credentials file not found');
        }

        // Load Firebase credentials from the JSON file
        $serviceAccount = json_decode(file_get_contents($firebaseCredentialsFile), true);
        // Create Firebase Factory with loaded credentials
        $factory = (new Factory)
            ->withServiceAccount($serviceAccount);
        
        $firestore = $factory->createFirestore();
        // Get Firestore database instance
        $database = $firestore->database();
        // Reference the "users" collection
        $usersCollection = $database->collection('users');
        // Get the document with the specified ID
        $userDocument = $usersCollection->document($id)->snapshot();
        // Check if the user document exists
        if (!$userDocument->exists()) {
            // User not found, handle appropriately (e.g., redirect back)
            return redirect()->back()->with('error', 'User not found');
        }
        // Get the user data
        $userData = $userDocument->data();
        
        // Pass the user data to the view and render the edit view
        return view('admin.verifield.edit', ['userData' => $userData]);
    }

    public function update(Request $request, $id)
    {
        // Get the path to the JSON file
        $firebaseCredentialsFile = storage_path('app/genzee-baddies.json');
       
        if (!file_exists($firebaseCredentialsFile)) {
            throw new \Exception('Firebase credentials file not found');
        }

        // Load Firebase credentials from the JSON file
        $serviceAccount = json_decode(file_get_contents($firebaseCredentialsFile), true);
        // Create Firebase Factory with loaded credentials
        $factory = (new Factory)
            ->withServiceAccount($serviceAccount);
        
        $firestore = $factory->createFirestore();
        // Get Firestore database instance
        $database = $firestore->database();
        // Reference the "users" collection
        $usersCollection = $database->collection('users');
        // Get the document with the specified ID
        $userDocument = $usersCollection->document($id);
        
        // Update user data with the data from the request
        $userDocument->set([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // Add more fields as needed
        ], ['merge' => true]); // Use merge to update existing fields without overwriting
        
        // Redirect back to the users index page or wherever you want after update
        return redirect()->route('users.verify')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        // Get the path to the JSON file
        $firebaseCredentialsFile = storage_path('app/genzee-baddies.json');
       
        if (!file_exists($firebaseCredentialsFile)) {
            throw new \Exception('Firebase credentials file not found');
        }

        // Load Firebase credentials from the JSON file
        $serviceAccount = json_decode(file_get_contents($firebaseCredentialsFile), true);
        // Create Firebase Factory with loaded credentials
        $factory = (new Factory)
            ->withServiceAccount($serviceAccount);
        
        $firestore = $factory->createFirestore();
        // Get Firestore database instance
        $database = $firestore->database();
        // Reference the "users" collection
        $usersCollection = $database->collection('users');
        
        // Delete the document with the specified ID
        $usersCollection->document($id)->delete();
        
        // Redirect back to the users index page or wherever you want after deletion
        return redirect()->route('users.verify')->with('success', 'User deleted successfully');
    }
}
