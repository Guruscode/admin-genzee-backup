<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Factory; // Use correct namespace
use Google\Cloud\Firestore\FirestoreClient;




class FirebaseController extends Controller
{


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
    return view('admin.users.edit', ['userData' => $userData]);
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
    
    // Update user data with the data from the form
    $userDocument->set([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        // Add more fields as needed
    ], ['merge' => true]); // Use merge to update existing fields without overwriting
    
    // Redirect back to the users index page or wherever you want after update
    return redirect()->route('users.index')->with('success', 'User updated successfully');
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
    return redirect()->route('users.index')->with('success', 'User deleted successfully');
}

public function sendToFirebase()
{
    // Load Firebase credentials
    $serviceAccount = json_decode(file_get_contents(storage_path('app/genzee-baddies.json')), true);

    // Create Firestore client
    $firestore = new FirestoreClient([
        'projectId' => $serviceAccount['project_id'],
    ]);
    // Reference the "users" collection
    $usersCollection = $firestore->collection('users');

    // Retrieve users from the database
    $users = DB::table('fake_users')->get();

    // Insert each user into Firestore
    foreach ($users as $user) {
        $usersCollection->add([
            'uid' => $user->uid,
            'about' => $user->about,
            'age' => $user->age,
            'alcohol' => $user->alcohol,
            'balance' => $user->balance,
            'bodyType' => $user->bodyType,
            'children' => $user->children,
            'city' => $user->city,
            'chatList' => $user->chatList,
            'company' => $user->company,
            'country' => $user->country,
            'dob' => $user->dob,
            'figureType' => $user->figureType,
            'gender' => $user->gender,
            'genotype' => $user->genotype,
            'height' => $user->height,
            'hideAccount' => $user->hideAccount,
            'hobbies' => $user->hobbies,
            'languages' => $user->languages,
            'lastOnline' => $user->lastOnline,
            'latitude' => $user->latitude,
            'likes' => $user->likes,
            'longitude' => $user->longitude,
            'name' => $user->name,
            'notification' => $user->notification,
            'online' => $user->online,
            'paid' => $user->paid,
            'partnerType' => $user->partnerType,
            'phoneNumber' => $user->phoneNumber,
            'position' => $user->position,
            'preference' => $user->preference,
            'profileImage' => $user->profileImage,
            'profileViews' => $user->profileViews,
            'smoking' => $user->smoking,
            'specialty' => $user->specialty,
            'state' => $user->state,
            'status' => $user->status,
            'university' => $user->university,
            'verified' => $user->verified,
            'weight' => $user->weight,
            'email' => $user->email,
        ]);
    }

    return redirect()->back()->with('success', 'Data sent to Firebase successfully.');
}

}
