<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Celebrant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CelebrantController extends Controller
{
     public function getAll(){
        try {

            $celebrants = Celebrant::all();

            return response()->json([
                'message' => "All celebrants were obtained successfully",
                'success' => true,
                'data' => $celebrants
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
    public function getById(string $id){
        try {

            $celebrant = Celebrant::where('id', '=', $id)->first();            

            if(is_null($celebrant)){
                return response()->json([
                    'message' => "Not Found",
                    'success' => true,
                    'data' => $celebrant
                ], 404);
            }

            return response()->json([
                'message' => "The celebrant with the id '".$id."' was obtained correctly",
                'success' => true,
                'data' => $celebrant
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
    public function update(Request $request, $id){
        try {
            $data = $request->all();

            // validar si corresponde al modelo            

            $celebrant = Celebrant::where('id','=', $id)->first();

            if(is_null($celebrant)){
                return response()->json([
                    'message' => "Not Found",
                    'success' => true,
                    'data' => null
                ], 404);
            }

            $celebrant->update($data);

            return response()->json([
                'message' => "The celebrant with the id '".$id."' was updated correctly",
                'success' => true,
                'data' => $celebrant
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
    public function create(Request $request){
        try {
            // check request params
            $data = $request->all();

            $birthday = Carbon::createFromFormat('d/m/Y', $data['birthday']);
            $data['birthday'] = $birthday->toDateString();

            $celebrant = new Celebrant();
            $celebrant->fill($data);

            $celebrant->save();

            return response()->json([
                'message' => "Successfully created",
                'success' => true,
                'data' => $celebrant,
            ], 200);

        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['error' => 'Internal server error'], 500);
        }       
    }
    public function delete(string $id){
        try {
            Celebrant::where('id', $id)->delete();

            return response()->json([
                'message' => "Successfully deleted",
                'success' => true
            ], 200);
            
        } catch (\Throwable $th) {
            // Handle other exceptions
            return response()->json(['error' => 'Internal server error'], 500);
        }       
    }
}
