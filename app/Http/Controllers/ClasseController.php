<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Http\Requests\StoreClasseRequest;
use App\Http\Requests\UpdateClasseRequest;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes = Classe::all();

        return view('classes', [
            'classes'=>$classes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('classes.createClasse');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClasseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClasseRequest $request)
    {
        $request->validate([
            'libelle'=> ['required','unique:classes'], 
        ]);
        
        Classe::create([
            'libelle' => $request->libelle
        ]);

        return back()->with('alertClasse', 'Une classe a ete cree avec succes.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classe = Classe::find($id);

        return view('classes.edit-classe', [
            'classes' => $classe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClasseRequest  $request
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClasseRequest $request, $id)
    {
        //
        $request->validated();
        $classe = Classe::find($id);
        
        $classe->libelle = $request->libelle;
        
        $classe->save();
        return redirect(route('classe.index'))->with('alertClasse', 'Modification effectuee avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classe = Classe::find($id);
        $nomClasse = $classe->libelle;

        $classe->delete();

        return redirect(route('classe.index'))->with('alertClasse', "$nomClasse vient d'etre supprimé.");
    }
}
