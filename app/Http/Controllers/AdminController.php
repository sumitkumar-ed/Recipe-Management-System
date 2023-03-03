<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Step;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use App\Traits\HasUuid;

class AdminController extends Controller
{
    //

    public function list()
    {
        $data = Recipe::all();
        return view('admin.home', compact(['data']));
    }

    public function edit($id)
    {
        $recipe = Recipe::where('uuid',$id)->first();
        //featching related data from recipes table, ingredients table and steps table
        $rdata = Recipe::where('uuid',$id)->first();
        $idata = $recipe->ingredients;
        $sdata = $recipe->steps;

        return view('admin.edit', compact(['rdata', 'idata', 'sdata']));
    }


    public function edit_ingredient($id)
    {

        $recipe = Recipe::where('uuid',$id)->first();
        //featching related data from recipes table, ingredients table and steps table

        $idata = $recipe->ingredients;



        return view('admin.edit-ingredient', compact(['idata']));
    }


    public function edit_step($id)
    {

        $recipe = Recipe::where('uuid',$id)->first();

        //featching related data from recipes table, ingredients table and steps table

        $sdata = $recipe->steps;


        


        return view('admin.edit-step', compact(['sdata']));
    }






    public function delete($id)
    {
        Recipe::where('uuid',$id)->delete();
        return redirect()->back();
    }





    public function store(Request $request)
    {
        $pic = $request->all();
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'picture' => 'required',
            'description' => 'required',
            
           

        


        ]);


        // $ingredient = $request->ingredient;

        // dd($ingredient);

        // Picture Upload
        if ($image = $request->file('picture')) {
            $name = time() . "." . $image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            $pic['picture'] = "$name";
        }

        // Insert data in Recipe Table
        $recipe = new Recipe;
        $recipe->uuid= Uuid::uuid4()->toString();
        $recipe->title =  $request['title'];
        $recipe->category = $request['category'];
        $recipe->picture = $pic['picture'];
        $recipe->description = $request['description'];
        $recipe->save();

        $id = $recipe->id;

        // Insert Data in Ingredients Table

        $ingredient = $request->ingredient;
        foreach ($ingredient as $ingredientitem) {
            // echo "$id";
            Ingredient::insert([

                'recipe_id' => $id,
                'ingredient' => $ingredientitem,


            ]);
        }

        $records = $request->input('ingredient');

        // dd($records);
        // foreach ($records as $record) {
        //     Ingredient::create($record);
        // }








        //Insert Data In Steps Table
        $step = $request->except('_token');

        // Loop through the data and save each record to the database
        foreach ($step['stepno'] as $key => $value) {


            // echo $value;
            // dd($step['ingredient'][$key]);
            $record = new Step;
            $record->recipe_id = $id;
            $record->step_no = $value;
            $record->step = $step['step'][$key];
            $record->save();
        }




        $recipes = Recipe::all();
        $data = Recipe::all();
        return redirect('/admin/home');
        // return view('admin.recipes', compact('recipes'));
        // return view('admin.home', compact('data'));
    }



    public function update(Request $request, $id)
    {
        $data = $request->all();
        // Picture Upload
        if ($image = $request->file('picture')) {
            $name = time() . "." . $image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            $data['picture'] = "$name";
        }

        // Update data in Recipe Table
        Recipe::where('uuid',$id)->update([
            'title' => $data['title'],
            'category' => $data['category'],
            'picture' => $data['picture'],
            'description' => $data['description']
        ]);


        // $recipes = Recipe::all();
        // $data = Recipe::all();
        // // return view('admin.recipes', compact('recipes'));
        return redirect('/admin/edit-ingredient/' . $id);
    }

    public function update_ingredient(Request $request)
    {
        $ids = $request->input('id');
        $recipeID= $request ->input('recipe_id');

        
        $ingredients = $request->input('ingredient');
        foreach ($ids as $index => $id) {
            
           Ingredient::find( $id)
                ->update([
                    'ingredient' => $ingredients[$index],
                    
                ]);
        }

        $i=$recipeID[0];
        $uuid= Recipe::where('id',$i)->value('uuid');
        $id = $uuid->uuid;
        return redirect('/admin/edit-step/' .$id);
    }




    public function update_step(Request $request)
    {
        $ids = $request->input('id');
        $step_no = $request->input('step_no');
        $step=$request->input('step');
        foreach ($ids as $index => $id) {
           Step::find( $id)
                ->update([
                    'step_no' => $step_no[$index],
                    'step' => $step[$index],
                    
                ]);
        }

        return redirect('/admin/home');
    }
}
