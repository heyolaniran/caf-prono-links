<?php

namespace App\Http\Controllers;

use App\Models\{Provider, Country};
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = Provider::with('country')->orderBy('id', 'DESC')->paginate(10) ; 

        return view('providers.index', [
            'providers' => $providers
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('enabled', true)->get(); 
        return view('providers.create', [
            'countries' => $countries
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:providers', 
            'account' => 'required|min:3|unique:providers', 
            'ussd' => 'required:min:4'
        ], [
            'name.required' => 'Veuiller nommer le moyen de paiement', 
            'account.required' => 'Attribuez un code au moyen de paiement', 
            'ussd.required' => 'Code USSD COMPLET'
        ]) ; 


        $provider = Provider::create($request->all()); 

        return redirect()->route('providers') ; 
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provider $provider)
    {
        return view('providers.edit', [
            'provider' => $provider
        ]) ; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provider $provider)
    {
        $request->validate([
            'name' => 'required|min:3|unique:providers', 
            'account' => 'required|min:3|unique:providers', 
            'ussd' => 'required:min:4'
        ], [
            'name.required' => 'Veuiller nommer le moyen de paiement', 
            'account.required' => 'Attribuez un code au moyen de paiement', 
            'ussd.required' => 'Code USSD COMPLET'
        ]) ;


        $provider->update($request->all()); 

        return redirect()->route('providers.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        //
    }

    public function status(Provider $provider) {

        $provider->update([
            'enabled' => !$provider->enabled
        ]); 


        return redirect()->route('providers.index'); 
    }
}
