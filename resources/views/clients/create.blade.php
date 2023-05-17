<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
   
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
            <h2>Ajouter un client</h2>
            @if(Session::has('success'))
            <div class="alert alert-sucess" role="alert">
                {{Session::get('success')}}
            </div>
            @endif
            <form method="post" action="{{ route('clients.store') }}">
                @csrf
                <div class="md-3">
                    <label class="form-label">Nom</label>
                    <input type="text" class="form-control" name="nom" placeholder="Nom">
                </div>
                <div class="md-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" class="form-control" name="prenom" placeholder="Prénom">
                </div>
                <div class="md-3">
                    <label class="form-label">Nom de la société</label>
                    <input type="text" class="form-control" name="societe" placeholder="Société">
                              
                <br>
                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                <a href="{{route('domains.index')}}" class="btn btn-danger">Retour</a>
            </form>
            </div>
        </div>
    </div>
</body>
</html>