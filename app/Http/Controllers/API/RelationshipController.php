<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Relationship;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function getAll(){
        try {

            $relationships = Relationship::with('celebrants')->get();

            return response()->json([
                'message' => "All relationships were obtained successfully",
                'success' => true,
                'data' => $relationships
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
    public function getById(string $id){
        try {

            $relationship = Relationship::where('id', '=', $id)->first();            

            if(is_null($relationship)){
                return response()->json([
                    'message' => "Not Found",
                    'success' => true,
                    'data' => $relationship
                ], 404);
            }

            return response()->json([
                'message' => "The relationship with the id '".$id."' was obtained correctly",
                'success' => true,
                'data' => $relationship
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
    public function update(Request $request, $id){
        try {

            $data = $request->all();            

            $relationship = Relationship::where('id','=', $id)->first();

            if(is_null($relationship)){
                return response()->json([
                    'message' => "Not Found",
                    'success' => true,
                    'data' => null
                ], 404);
            }

            $relationship->update($data);

            return response()->json([
                'message' => "The relationship with the id '".$id."' was updated correctly",
                'success' => true,
                'data' => $relationship
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
    public function create(Request $request){
        try {
            
            $data = $request->all();

            $relationship = new Relationship();
            $relationship->name = $data['name'];
            $relationship->save();

            return response()->json([
                'message' => "Successfully created",
                'success' => true,
                'data' => $relationship,
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
