<?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Models\Tuteur;

class TuteurController extends Controller
{
    public function liste_tuteur()
    {
        $tuteur = tuteur::all();
        return view('tuteur.liste2', compact('tuteur'));
    }
    public function ajouter_tuteur()
          
    {
        $etudiant = Etudiant::all();
        return view('tuteur.ajouter2', compact('etudiants')); 
    }
    public function ajouter_tuteur_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'profession' => 'required',
        ]);
        
        $tuteur = new tuteur();
        $tuteur->nom = $request->nom;
        $tuteur->prenom = $request->prenom;
        $tuteur->profession = $request->profession;
        $tuteur->save();
        
        return redirect('/ajouter2')->with('status', 'Le tuteur a été ajouté avec succès.');
    }
    
    public function update_tuteur($id){
        $tuteur = tuteur::find($id);
        $etudiant = Tuteur::all();
        $etudiants = Etudiant::find($id);
        
        return view('tuteur.update2', compact('tuteur', 'etudiant'));
    }
    
    public function update_tuteur_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'profession' => 'required',
        ]);
    
        $tuteur = Tuteur::find($request->id);
        $tuteur->nom = $request->nom;
        $tuteur->prenom = $request->prenom;
        $tuteur->profession = $request->profession;
        $tuteur->update();
        return redirect('/tuteur')->with('status', 'Le tuteur a été modifié avec succès.'); 
    }
    
    public function delete_tuteur($id){
        $tuteur = Tuteur::find($id);
        $tuteur->delete();
        return redirect('/tuteur')->with('status', 'Le tuteur a bien été supprimé.'); 
    }
    public function image()
{
    return $this->hasOne(Image::class);
}
}

