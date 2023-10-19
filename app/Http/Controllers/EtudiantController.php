<?php

namespace App\Http\Controllers;
use App\Models\Tuteur;
use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    public function liste_etudiant()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.liste', compact('etudiants'));
    }
    public function ajouter_etudiant()
    {
        $tuteur = Tuteur::all();
        return view('etudiant.ajouter', compact('tuteur'));
    }
    public function ajouter_etudiant_traitement(Request $request)
    {
        $request->validate([
            'photo' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
            'tuteur' => 'required',
        ]);
        
        $etudiant = new Etudiant();
        $etudiant->photo = $request->photo;
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->tuteur_id = $request->tuteur;
        $etudiant->save();
        
        return redirect('/ajouter')->with('status', 'L\'étudiant a été ajouté avec succès.');
    }
    
    public function update_etudiant($id){
        $etudiants = Etudiant::find($id);
        $tuteur = tuteur::all();
        
        return view('etudiant.update', compact('etudiants', 'tuteur'));
    }
    
    public function update_etudiant_traitement(Request $request)
    {
        $request->validate([
            'photo' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);
    
        $etudiant = Etudiant::find($request->id);
        $etudiant->photo = $request->photo;
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->tuteur_id = $request->tuteur_id;
        $etudiant->update();
        return redirect('/etudiant')->with('status', 'L\'étudiant a été modifié avec succès.'); 
    }
    
    public function delete_etudiant($id){
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
        return redirect('/etudiant')->with('status', 'L\'étudiant a bien été supprimé.'); 
    }
    public function image()
{
    return $this->hasOne(Image::class);
}
}

