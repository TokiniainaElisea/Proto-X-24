<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Stock\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        return view('fournisseurs.providers', ['providers' => Provider::paginate(10)]);
    }
    // nouveau fournisseur
    public function new_privider_form(){
        return view('fournisseurs.parts.new_provider');
    }


    //new provider
    public function new(ProviderRequest $request)
    {
        $provider = Provider::create($request->validated());
        return to_route('provider')->with('success', 'Nouveau fournisseur ajouté');
    }

    //edit provider
    public function edit_provider($id){
        return view('fournisseurs.parts.edit', ['provider' => Provider::findOrFail($id)]);
    }
    //update provider
    public function update(ProviderRequest $request, Provider $provider)
    {
        $provider->update($request->validated());
        return to_route('provider')->with('success', 'Modification(s) effectuée(s)');
    }

    //show provider 
    public function show_provider($id){
        return view('fournisseurs.parts.show_provider', ['provider' => Provider::findOrFail($id) ]);
    }
    //destroy provider
    public function delete(Provider $provider)
    {
        $provider->delete();
        return to_route('provider')->with('success', 'Suppression effectuée');
    }
}
