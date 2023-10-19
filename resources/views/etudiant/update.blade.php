<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   <div class="container">
         <div class="row">
  
            <h1>MODIFIER UN ETUDIANT</h1>
            <hr>
            
            @if (session('status'))
                <div class="alert alert-success">
                        {{ session('status') }}
                </div>
            @endif
            
            <ul>
                 @foreach ($errors->all() as $error)
                    <li class="alert alert-danger"> {{ $error }}  </li>
              
                @endforeach
              
            </ul>
              
             
              
                     <form action="/update/traitement" method="POST" class="form-group">
                            @csrf
                             
                             <input type="text" name="id" style="display: none;" value="{{ $etudiants->id }}">
                             
                             <div class="form-group">
                                 <label for="Nom" class="form-label">Nom</label>
                                 <input type="text" class="form-control" id="Nom" name="nom" value="{{ $etudiants->nom }}">
                                 
                             </div>
                             <div class="form-group">
                                 <label for="prenom" class="form-label">Prénom</label>
                                 <input type="text" class="form-control" id="Prénom" name="prenom" value="{{ $etudiants->prenom }}">
                             </div>
                             <div class="form-group">
                                 <label for="classe" class="form-label">Classe</label>
                                 <input type="text" class="form-control" id="Classe" name="classe" value="{{ $etudiants->classe }}">
                             </div>
                             <div class="form-group">
                                 <label for="image" class="form-label">Photos</label>
                                 <input type="file" class="form-control" id="image" name="image" value="{{ $etudiants->images }}">
                             </div>
                             <br>
                             <select class="form-select" aria-label="Default select example" name="tuteur">
                                  <option selected>Tuteurs</option>
                                  @foreach ($tuteur as $tuteur)
                                  <option value="{{ $tuteur->id }}">
                                  {{ $tuteur->nom }} {{ $tuteur->prenom }}
                                  </option>
                                  @endforeach
                              </select>
                             <br>
                                 <button type="submit" class="btn btn-primary">Modifier un étudiant</button>
                  <br> <br>
                  <a href="/etudiant" class="btn btn-danger">Revenir à la liste des étudiants</a>
                    </form>
                             </div>
    
         </div>
     </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>