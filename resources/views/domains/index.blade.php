<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des noms de domaine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Liste des noms de domaine</h1>
        <p>
            <a href="{{ route('domains.create') }}" class="btn btn-primary">Ajouter un nom de domaine</a>
            <a href="{{ route('clients.create') }}" class="btn btn-primary">Ajouter un client</a>
        </p>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom de domaine</th>
                    <th>Coût annuel</th>
                    <th>Client</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($domains as $domain)
                    <tr>
                        <td>{{ $domain->nom_domaine }}</td>
                        <td>{{ $domain->cout_annuel }} €</td>
                        <td>{{ $domain->client ? $domain->client->societe : '' }}</td>
                        <td>{{ $domain->client ? $domain->client->nom : '' }}</td>
                        <td>{{ $domain->client ? $domain->client->prenom : '' }}</td>
                        <td>
                            <a href="{{ route('domains.edit', $domain->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('domains.destroy', $domain->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce nom de domaine ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if(count($domains) == 0)
                    <tr>
                        <td colspan="6" class="text-center">Aucun nom de domaine enregistré pour l'instant</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>