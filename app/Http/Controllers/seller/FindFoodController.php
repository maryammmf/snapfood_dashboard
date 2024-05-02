<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\food\FindFoodByCategoryRquest;
use App\Http\Requests\seller\food\FindFoodByNameRequest;
use App\Models\seller\Food;

class FindFoodController extends Controller
{
    public function searchByName(FindFoodByNameRequest $request){
        $validated = $request->validated();
        $foods = Food::query()->where('name' , $validated['name'])->paginate(5);
//        dd($foods);
        return view('panel-pages.seller.foods.showFind' , compact('foods'));
    }


    public function searchByCategory(FindFoodByCategoryRquest $request){
        $validated = $request->validated();
        $foods = Food::query()->where('food_category_id' , $validated['food_category_id'])->paginate(5);
//        dd($food);
        return view('panel-pages.seller.foods.showFind' , compact('foods'));
    }

}
