<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $current_page = '';
        $count = $request->count;
        dump($request->all());
        $countries = Country::paginate(10);
        return view('country', compact('countries', 'count'));
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
