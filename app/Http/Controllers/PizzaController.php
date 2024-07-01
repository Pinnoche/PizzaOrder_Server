<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePizzaRequest;
use App\Http\Controllers\PizzaController;
use App\Http\Requests\DeletePizzaRequest;
use App\Http\Requests\UpdatePizzaRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Resources\PizzaResource;

class PizzaController extends Controller
{
    public function index(){
        $pizzas = PizzaResource::collection(Pizza::all());
        return response()->json([
            'pizzas' => $pizzas
        ], 200);
    }

    public function store(StorePizzaRequest $request) {
                 
                     return response()->json([
                         'message' => 'Pizza Uploaded Successfully'
                     ], 200);
    }

    public function show(Pizza $pizza){
        // $pizza = Pizza::find($id);
        return response()->json(['pizza' => $pizza], 200); 
    }

    public function edit(Pizza $pizza){
            return response()->json(['pizza' => $pizza], 200);
    }

    public function update(UpdatePizzaRequest $request, Pizza $pizza){
            $pizza->update([
                'name' => $request->name,
                'type' => $request->type,
                'base' => $request->base
            ]);

            return response()->json([
                'message' => 'Pizza Updated Successfully'
            ], 200);
    }

    public function destroy(DeletePizzaRequest $request, Pizza $pizza ){

            $pizza->delete();
     
            return response()->json([
                'message' => 'Pizza has been Successfully deleted'
            ], 200);

    }
}
