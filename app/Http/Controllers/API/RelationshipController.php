<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Relationship;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function getAll(){
        try {

            $data = Relationship::all();

            return response()->json([
                'message' => "All relationships were obtained successfully",
                'success' => true,
                'data' => $data
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function getById(string $id){
        try {

            $data = Relationship::find($id);

            if(is_null($data)){
                return response()->json([
                    'message' => "Not Found",
                    'success' => true,
                    'data' => $data
                ], 404);
            }

            return response()->json([
                'message' => "The relationship with the id '".$id."' was obtained correctly",
                'success' => true,
                'data' => $data
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function update(Request $request, $id){
        try {

            // $data['name'] = $request['name'];
            $data['name'] = $request->query('name');
            Relationship::find($id)->update($data);

            return response()->json([
                'message' => "The relationship with the id '".$id."' was updated correctly",
                'success' => true,
                'data' => $data
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function create(Request $request){
        try {
            
            $data['name'] = $request->query('name');
            $created = Relationship::create($data);

            return response()->json([
                'message' => "Successfully created",
                'success' => true,
                'data' => $created,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }       
    }

    public function delete(string $id){
        try {
            Relationship::where('id', $id)->delete();

            return response()->json([
                'message' => "Successfully deleted",
                'success' => true
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }        
    }


}
