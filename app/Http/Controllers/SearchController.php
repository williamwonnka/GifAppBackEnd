<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gifs;

class SearchController extends Controller
{
    public function search($name)
    {
        $results = Gifs::where('title', 'like', '%' . $name . '%')
                      ->select('id', 'title', 'url')
                      ->get();

        return response()->json(['data' => $results]); // Ensure the 'data' key is present
    }

    public function insertData(Request $request)
    {
        $data = new Gifs();
        $data->title = $request->input('title');
        $data->url = $request->input('url');
        $data->save();

        return response()->json(['message' => 'Data inserted successfully'], 201);
    }


    public function deleteItem($id)
{
    // Find the item by ID
    $item = Gifs::find($id);

    // If the item doesn't exist, return a not found response
    if (!$item) {
        return response()->json(['error' => 'Item not found'], 404);
    }

    // Delete the item
    $item->delete();

    // Return a success response
    return response()->json(['message' => 'Item deleted successfully']);
}
}
