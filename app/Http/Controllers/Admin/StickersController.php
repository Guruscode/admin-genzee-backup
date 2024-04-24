<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sticker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Kreait\Firebase\Factory; // Use correct namespace
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\ServiceAccount;


class StickersController extends Controller
{

    public function index()
    {
        // Set your GIPHY API key
        $apiKey = "UGwce8H7Oc4dQuhXDCw81IyWHWRdq6pM";
    
        // Set request parameters
        $limit = 600; // Number of stickers to return
    
        // Build the API endpoint URL
        $endpoint = "https://api.giphy.com/v1/stickers/trending?api_key=$apiKey&limit=$limit";
    
        // Initialize cURL session
        $curl = curl_init();
    
        // Set cURL options
        curl_setopt($curl, CURLOPT_URL, $endpoint);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
        // Execute cURL request
        $response = curl_exec($curl);
    
        // Check for errors
        if ($response === false) {
            $errorMessage = "Failed to fetch stickers from the GIPHY API: " . curl_error($curl);
            // Handle error
            curl_close($curl);
            return view('admin.stickers.index')->with('errorMessage', $errorMessage);
        }
    
        // Close cURL session
        curl_close($curl);
    
        // Decode JSON response
        $stickerData = json_decode($response, true);
    
        // Check if stickers were successfully retrieved
        if (isset($stickerData['data'])) {
            $stickers = $stickerData['data'];

                        // Paginate the fetched stickers after uploading to Firebase Storage
                $perPage = 10; // Number of items per page
                $page = \Illuminate\Pagination\Paginator::resolveCurrentPage();
                $totalItems = count($stickers);

                // Calculate the starting index for the current page
                $start = ($page - 1) * $perPage;

                // Get only the items for the current page
                $currentPageItems = array_slice($stickers, $start, $perPage);

                // Create a LengthAwarePaginator instance with the current page's items
                $stickers = new \Illuminate\Pagination\LengthAwarePaginator(
                    $currentPageItems,
                    $totalItems,
                    $perPage,
                    $page,
                    ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
                );

            
            return view('admin.stickers.index', compact('stickers'));
            }else {
            $errorMessage = "Failed to fetch stickers from the GIPHY API.";
            return view('admin.stickers.index')->with('errorMessage', $errorMessage);
        }
    }

}
