<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;


class VerifieldController extends Controller
{


    public function dashboard() {
        $firebaseCredentialsFile = storage_path('app/genzee-baddies.json');

        if (!file_exists($firebaseCredentialsFile)) {
            throw new \Exception('Firebase credentials file not found');
        }
        
        $serviceAccount = json_decode(file_get_contents($firebaseCredentialsFile), true);
        
        $factory = (new Factory)
            ->withServiceAccount($serviceAccount);
        
        $firestore = $factory->createFirestore();
        
        $database = $firestore->database();
        
        $messagesCollection = $database->collection('complaints');
        
        // Get all documents in the messages collection
        $documents = $messagesCollection->documents();
    
        $stickersCollection = $database->collection('stickers');
        
        // Get all documents in the messages collection
        $stickers = $stickersCollection->documents();
        
      

        
        $usersCollection = $database->collection('users');
        
        $totalPhoto = 0; // Initialize total photo count
        
        // Get all documents in the users collection
        $userDocuments = $usersCollection->documents();
        
        // Iterate over each document in the users collection
        foreach ($userDocuments as $document) {
            // Check if the document has a profileImage field and it's not empty
            if ($document->exists('profileImage') && $document['profileImage']) {
                $totalPhoto++; // Increment total photo count
            }
        }
    
        // Filter users where paid is true
    $paidUsersQuery = $usersCollection->where('paid', '=', true);
    
    // Get all documents for paid users
    $paidUserDocuments = $paidUsersQuery->documents();
    
    $totalPaidUsers = $paidUserDocuments->size(); 
       $totalComplains = $documents->size();
        $totalUsers = $userDocuments->size();
        $totalStickers = $stickers->size();
        
        return view('dashboard', compact('totalPhoto', 'totalStickers', 'totalUsers', 'totalComplains', 'totalPaidUsers'));
        
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
