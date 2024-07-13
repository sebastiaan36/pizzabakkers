<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use App\Http\Requests\StoreIngredientsRequest;
use App\Http\Requests\UpdateIngredientsRequest;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all ingredients
        $ingredients = Ingredients::all();
        return view('ingredients.index')->with('ingredients', $ingredients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create new ingredient
        return view('ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIngredientsRequest $request)
    {
        //store new ingredient
        $ingredient = Ingredients::create([
            'name' => $request->name,
        ]);
        return redirect()->route('ingredient.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredients $ingredients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredients $ingredients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngredientsRequest $request, Ingredients $ingredients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredients $ingredients)
    {
        //
    }
}
