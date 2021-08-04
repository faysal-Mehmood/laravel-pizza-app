<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{

  public function index() {
    // get data from a database
    $pizzas = Pizza::all();

    return view('pizzas.index', [
      'pizzas' => $pizzas,
    ]);
  }

  public function show($id) {
    // use the $id variable to query the db for a record
    $pizza=Pizza::findOrFail($id);
    return view('pizzas.show', ['pizza'=>$pizza]);
  }
  public function create() {
    // use the $id variable to query the db for a record
    return view('pizzas.create');
  }
  public function store() {
    // use the $id variable to query the db for a record
    $pizza= new Pizza();
    $pizza->name=request('name');
    $pizza->type=request('type');
    $pizza->base=request('base');
    $pizza->price=15;
    $pizza->toppings=request('toppings');

    $pizza->save();
    return redirect('/')->with('msg', 'Thanks for Ordering');

  }
  public function destroy($id) {
    // use the $id variable to query the db for a record
    $pizza=Pizza::findOrFail($id);
    $pizza->delete();
     return redirect('/pizzas');
  }

}
