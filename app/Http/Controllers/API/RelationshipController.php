<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Relationship;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RelationshipController extends Controller
{
    public function index(){
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
    public function show(Relationship $relationship){
        try {          

            if(is_null($relationship)){
                return response()->json([
                    'message' => "Not Found",
                    'success' => true,
                    'data' => $relationship
                ], 404);
            }

            return response()->json([
                'message' => "The relationship with the id '".$relationship->id."' was obtained correctly",
                'success' => true,
                'data' => $relationship
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
    public function update(Request $request, Relationship $relationship){
        try {

            $data = $request->all();
            
            // Validate the request data using dynamic rules from the model
            $request->validate(Relationship::rules($data));          

            if(is_null($relationship)){
                return response()->json([
                    'message' => "Not Found",
                    'success' => true,
                    'data' => null
                ], 404);
            }

            $relationship->update($data);

            return response()->json([
                'message' => "The relationship with the id '".$relationship->id."' was updated correctly",
                'success' => true,
                'data' => $relationship
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
    public function store(Request $request){
        try {

            $data = $request->all();

            // Validate the request data using dynamic rules from the model
            $request->validate(Relationship::rules($data));            

            $relationship = new Relationship();
            $relationship->fill($data);
            $relationship->save();

            return response()->json([
                'message' => "Successfully created",
                'success' => true,
                'data' => $relationship,
            ], 200);

        } catch (ValidationException $e) {
            // Handle validation errors
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }       
    }
    public function destroy(Relationship $relationship){
        try {

            if(is_null($relationship)){
                return response()->json([
                    'message' => "Not Found",
                    'success' => true,
                    'data' => null
                ], 404);
            }

            $relationship->delete();

            return response()->json([
                'message' => "Successfully deleted",
                'success' => true
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }        
    }
}
