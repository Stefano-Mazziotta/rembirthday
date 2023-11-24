<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Relationship;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function getAll(){
        $data = Relationship::all();
        return response()->json($data, 200);
    }

    public function create(Request $request){
        $data['name'] = $request->query('name');
        Relationship::create($data);
        return response()->json([
            'message' => "Successfully created",
            'success' => true
        ], 200);
    }
}
