<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $list_count = [5,10,15,25,50];
        $current_page = '';
        $count = $request->count;
        if(!isset($request->count)){
            $count = 15;
        }
        $search = $request->search;
        if(!isset($request->search)){
            $search = '';
        }
        
        $countries = Country::query()
        ->where('name','like','%'.$search.'%')
        ->paginate($count);
        return view('country', compact('countries', 'count','list_count','search'));
    }

    public function increment(Country $country, Request $request)
    {
        $country->update([
           'top' => $country->top + 1,
        ]);
        return to_route('country.index');
    }

    public function decrement(Country $country, Request $request)
    {
        $country->update([
           'top' => $country->top - 1,
        ]);
        return to_route('country.index');
    }

    public function delete(Country $country)
    {
        $country->delete();
        return to_route('country.index');
    }
}
