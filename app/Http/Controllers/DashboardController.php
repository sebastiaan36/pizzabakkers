<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Ingredients;

class DashboardController extends Controller
{
    public function index()
    {

        $pizza = Pizza::inRandomOrder()->first();
        $ingredients = Ingredients::all();
        $ingredients = $ingredients->sortBy('name');
        //count the number of ingredients in the pizza
        $count = $pizza->ingredients->count();
        return view('welcome')->with(compact('pizza', 'ingredients', 'count'));
    }
}
