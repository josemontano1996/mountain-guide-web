<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Log;

class AdminCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $countries = Country::all();

        return view('admin.country.index', ['countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {

        try {

            Country::createFromValidatedData($request->validated());
            return redirect()->route('admin.country.index')->with('success', 'País creado exitosamente.');

        } catch (\Exception $e) {

            Log::error('Error when deleting country', ['exception' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error guardando país');

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('admin.country.edit', ['country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, Country $country)
    {
        try {
            $success = Country::updateFromValidatedData($country, $request->validated());

            if (!$success) {
                throw new \Exception('No instance from Country found.');
            }

            return redirect()->route('admin.country.index')->with('success', 'País actualizado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error when updating country', ['exception' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error actualizando país');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
