<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $etudiants = Etudiant::all();

        return view('etudiant', [
            'etudiants' => $etudiants
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
        $classes = Classe::get();
        return view('etudiants.addEtudiant', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEtudiantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEtudiantRequest $request)
    {

        $data = $request->validated();

        Etudiant::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'classe_id' => $request->classe_id,
        ]);
        
        return redirect(route('etudiant.index'))->with('alertEtudiant', "L'etudiant $request->nom  $request->prenom a ete cree avec succes.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $etudiant = Etudiant::find($id);
        $classes = Classe::get();


        return view('etudiants.edit-etudiant', [
            'etudiants' => $etudiant,
            'classes' => $classes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEtudiantRequest  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEtudiantRequest $request, $id)
    {
        //
        $request->validated();
        $etudiant = Etudiant::find($id);
        
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe_id = $request->classe_id;
        
        $etudiant->save();
        // $nomEtudiant = $etudiant->nom.' '.$etudiant->prenom;
        return redirect(route('etudiant.index'))->with('alertEtudiant', 'Modification effectuee avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = Etudiant::find($id);
        $nomEtudiant = $student->nom . ' ' . $student->prenom;

        $student->delete();

        return redirect(route('etudiant.index'))->with('alertEtudiant', "$nomEtudiant vient d'etre supprimé.");
    }
}
