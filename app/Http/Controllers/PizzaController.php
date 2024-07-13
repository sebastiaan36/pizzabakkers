<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Ingredients;
use App\Http\Requests\StorePizzaRequest;
use App\Http\Requests\UpdatePizzaRequest;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all pizzas
        $pizzas = Pizza::all();
        return view('pizza.index')->with('pizzas', $pizzas);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create new pizza
        return view('pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePizzaRequest $request)
    {
        //store new pizza
        $pizza = Pizza::create([
            'name' => $request->name,
        ]);
        return redirect()->route('pizza.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pizza $pizza)
    {
        //return pizza
        //return all the ingredients of the pizza to the view
        $pizza = Pizza::with('ingredients')->where('id', $pizza->id)->first();



        return view('pizza.show')->with('pizza', $pizza);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pizza $pizza)
    {
        //return the pizza to the view

        $ingredients = Ingredients::all();
        return view('pizza.edit')->with(compact('pizza', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePizzaRequest $request, Pizza $pizza)
    {
        // store ingredients in the pivot table

        $pizza->ingredients()->sync($request->ingredients);

        return redirect()->route('pizza.index');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pizza $pizza)
    {
        //
    }
}
