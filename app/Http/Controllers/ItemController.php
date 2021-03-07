<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::orderBy('created_at', 'DESC')->get();

        if ($item) {
            return response()->json([
                'success' => true,
                'message' => "Successfully retrieved.",
                'data' => $item,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Not found!",
                'data' => [],
            ], 404);
        }

    }

    public function store(Request $request)
    {
        $item = Item::create([
            'title' => $request->get('title'),
        ]);

        return response()->json([
            'success' => true,
            'message' => "Successfully created.",
            'data' => $item,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        if ($item) {
            $completed = $request->get('completed');
            $update_data = [
                'completed' => $completed,
                'completed_at' => $completed ? Carbon::now() : null,
            ];

            $item->update($update_data);

            return response()->json([
                'success' => true,
                'message' => "Successfully updated.",
                'data' => $item,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Not found!",
                'data' => [],
            ], 404);
        }
    }

    public function destroy($id)
    {
        $item = Item::find($id);

        if ($item) {
            $item->delete();

            return response()->json([
                'success' => true,
                'message' => "Successfully deleted.",
                'data' => [],
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Not found!",
                'data' => [],
            ], 404);
        }
    }
}
