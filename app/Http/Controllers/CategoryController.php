<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();

        return view('categories.index')
            ->with('categories', $categories);
    }

    public function create(){
        $categories = Category::orderBy('Name','ASC')->get();

        return view('categories.create')
            ->with('categories', $categories);
    }


    public function store(Request $request){
        //Falten definir rules al model
        //$validation = $request->validate(Category::$rules);

        //Capta camps del formular
        //$name = $_POST['name'];

        //Crear  i posa valors del formulari
        $category = new Category;
        //$category->name = $name;

        //Guarda
        $category->save();

        //Mostra index
        return redirect()->route('categories.index');

    }


    public function edit($id){
        $category = Category::find($id);

        return view('categories.edit')
            -> with('category', $category);
    }

    public function update(Request $request, $id){

        //Validació:
        $validation = $request->validate(
            // Validar des del model:
            //Category::$rules

        );

        //Agafo valors del questionari
        //$name = $request["name"];

        //Busques object
        $category = Category::find($id);

        //Posa els valors del form
        //$category->name = $name;

        $category->save();

        return redirect()->route('categories.index');

    }

    public function destroy($id){
        $category= Category::find($id);
        $category->delete();

        return redirect()->route('categories.index');

    }


}
