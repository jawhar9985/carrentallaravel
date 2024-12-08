<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;


use App\Models\Voitures;
use Illuminate\Http\Request;


class VoituresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voiture = \App\Models\Voitures::all();
    
        return view('index', compact('voiture'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'marque' => 'required|max:255',
            'prix' => 'required',
        ]);
    
        $car = Voitures::create($validatedData);
    
        return redirect('/voitures')->with('success', 'Voiture crée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Voitures::findOrFail($id);

        return view('edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'marque' => 'required|max:255',
            'prix' => 'required'
        ]);
    
        Voitures::whereId($id)->update($validatedData);
    
        return redirect('/voitures')->with('success', 'Voiture mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Voitures::findOrFail($id);
    $car->delete();

    return redirect('/voitures')->with('success', 'Voiture supprimer avec succèss');
    }
}
