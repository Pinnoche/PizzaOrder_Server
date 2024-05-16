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

        return response()->json([
            'pizzas' => $pizzas
        ], 200);
    }

    public function store(PizzaRequest $request) {
        //          return response()->json([
        //              'status' => 500,
        //              'message' => 'Somethng Went Wrong'
        //          ], 500);
        
        $pizza = Pizza::create([
                     'name' => $request->name,
                     'type' => $request->type,
                     'base' => $request->base,
                 ]);
                     return response()->json([
                         'message' => 'Pizza Uploaded Successfully'
                     ], 200);
    }

    public function show(Pizza $pizza){
        // $pizza = Pizza::find($id);
            return response()->json([
                'pizza' => $pizza
            ], 200); 
    }

    public function edit(Pizza $pizza){
            return response()->json([
                'pizza' => $pizza
            ], 200);
    }

    public function update(PizzaRequest $request, Pizza $pizza){
            $pizza->update([
                'name' => $request->name,
                'type' => $request->type,
                'base' => $request->base
            ]);

            return response()->json([
                'message' => 'Pizza Updated Successfully'
            ], 200);
    }

    public function destroy(Pizza $pizza){
            $pizza->delete();

            return response()->json([
                'message' => 'Pizza has been Successfully deleted'
            ], 200);

    }
}
