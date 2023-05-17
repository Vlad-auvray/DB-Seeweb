<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un domaine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
   
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
                <h2>Modifier un domaine</h2>
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <form method="post" action="{{ url('/domains/save') }}">
                    @csrf
                    <div class="md-3">
    <label class="form-label">Nom de la société</label>
    <select class="form-select" name="client_id">
        <option value="">Sélectionnez une société</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->societe }}</option>
        @endforeach
    </select>
</div>
                    <div class="md-3">
                        <label class="form-label">Nom de domaine</label>
                        <input type="text" class="form-control" name="nom_domaine" value="{{ $domain->nom_domaine }}" placeholder="exemple.bzh">
                    </div>
                    <div class="md-3">
                        <label class="form-label">Coût annuel en €</label>
                        <input type="number" step="0.01" class="form-control" name="cout_annuel" value="{{ $domain->cout_annuel }}" placeholder="Montant">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    <a href="{{ url('/domains') }}" class="btn btn-danger">Retour</a>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>