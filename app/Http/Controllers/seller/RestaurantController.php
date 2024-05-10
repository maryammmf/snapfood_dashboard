<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\restaurant\DestroyRequest;
use App\Http\Requests\seller\Restaurant\RegisterRequest;
use App\Http\Requests\seller\restaurant\UpdateRequest;
use App\Models\Admin\RestaurantCategory;
use App\Models\seller\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $restaurants = Restaurant::query()->where('seller_id' , Auth::id())->get();
        return view('panel-pages.seller.restaurant.index' , compact('restaurants'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(int $sellerId)
    {
        $restaurantCategories = RestaurantCategory::all();
        return view('register.restaurant' , compact('restaurantCategories' , 'sellerId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();
        Restaurant::query()->create($validated);
        return redirect(route('seller.login.show'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        $restaurantCategories = RestaurantCategory::all();
        return view('panel-pages.seller.restaurant.edit' , compact('restaurant' , 'restaurantCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Restaurant $restaurant)
    {
        $validated = $request->validated();

//      set schedule
        $schedule = [];
        foreach ($validated['days'] as $key=>$day){
            if (isset($validated['days_time'][$key])){
            $schedule[]= "$day {$validated['days_time'][$key]}";
            }
        }
        $validated['schedule'] = json_encode($schedule);
        unset($validated['days']);
        unset($validated['days_time']);

//        set address
        $address = [
          'address'=>$validated['address'],
          'latitude'=>$validated['latitude'],
          'longitude'=>$validated['longitude'],
        ];
        $validated['address'] = json_encode($address);



//      set photo
        $file = $request->file('photo');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images') , $fileName);
        $validated['photo'] = $fileName;


        $validated['seller_id'] = Auth::guard('seller')->id();
        $restaurant->update($validated);
        return redirect(route('restaurant.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyRequest $request)
    {
        Restaurant::query()->where('id' , $request->id)->delete();
        return back();
    }

}
