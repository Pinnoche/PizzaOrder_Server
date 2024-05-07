<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Http\Requests\PizzaRequest;
use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Validator;

class PizzaController extends Controller
{
    public function index(){
        $pizzas = Pizza::all();

        if($pizzas->count() > 0) {
            return response()->json([
                'status' => 200,
                'pizzas' => $pizzas
            ], 200);
        }
            return response()->json([
                'status' => 404, 
                'pizzas' => 'No record found'
            ]);
              
    }

    public function store(PizzaRequest $request) {
        // $validator = Validator::make($request->all(), [
        //  'name' => 'required|string|max:200',
        //  'type' => 'required',
        //  'base' => 'required',
        // ]);
 
        // if($validator->fails()){
        //  return response()->json([
        //      'status' => 422,
        //      'errors' => $validator->messages()
        //  ], 422);
        // } else {
        //      $pizza = Pizza::create([
        //          'name' => $request->name,
        //          'type' => $request->type,
        //          'base' => $request->base,
        //      ]);
 
        //      if($pizza){
        //          return response()->json([
        //              'status' => 200,
        //              'message' => 'Pizza Uploaded Successfully'
        //          ], 200);
                
        //         } else {
        //          return response()->json([
        //              'status' => 500,
        //              'message' => 'Somethng Went Wrong'
        //          ], 500);
        //         }
        // }
        
        $pizza = Pizza::create([
                     'name' => $request->name,
                     'type' => $request->type,
                     'base' => $request->base,
                 ]);
     
                 if($pizza){
                     return response()->json([
                         'status' => 200,
                         'message' => 'Pizza Uploaded Successfully'
                     ], 200);
                    
                    } 
                     return response()->json([
                         'status' => 500,
                         'message' => 'Somethng Went Wrong'
                     ], 500);
                    
    }

    public function show($id){
        $pizza = Pizza::find($id);
        if($pizza){
            return response()->json([
                'status' => 200,
                'pizza' => $pizza
            ], 200);
        }
            return response()->json([
                'status' => 404, 
                'stew' => 'No record found'
            ]);
        
        
    }

    public function edit($id){
        $pizza = Pizza::find($id);
        if($pizza){
            return response()->json([
                'status' => 200,
                'pizza' => $pizza
            ], 200);
        } else {
            return response()->json([
                'status' => 404, 
                'pizza' => 'No record found'
            ], 404);
        }

    }

    public function update(PizzaRequest $request, int $id){
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:200',
        //     'type' => 'required',
        //     'base' => 'required',
        //    ]);
    
        //    if($validator->fails()){
        //     return response()->json([
        //         'status' => 422,
        //         'errors' => $validator->messages()
        //     ], 422);
        //    } else {
             
        //    }

        $pizza = Pizza::find($id);
    
        if($pizza){
            $pizza->update([
                'name' => $request->name,
                'type' => $request->type,
                'base' => $request->base
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Pizza Updated Successfully'
            ], 200);
           } 

            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
           

    }

    public function destroy($id){
        $pizza = Pizza::find($id);

        if($pizza){
            $pizza->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Pizza has been Successfully deleted'
            ], 200);

           } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Pizza Exist!'
            ], 404);
           }

    }
}
