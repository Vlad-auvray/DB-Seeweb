<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Client;

class DomainController extends Controller
{
    public function index(Request $request)
    {
        $domains = Domain::with('client')->orderBy('nom_domaine');

        if ($request->has('search')) {
            $search = $request->search;
            $domains = $domains->where('nom_domaine', 'LIKE', "%{$search}%");
        }

        if ($request->has('sort')) {
            $sort = $request->sort;
            $direction = $request->has('direction') ? $request->direction : 'asc';
            $domains = $domains->orderBy($sort, $direction);
        }

        $domains = $domains->paginate(10);

        return view('domains.index', compact('domains'));
    }

    public function create()
    {
        $clients = Client::orderBy('societe')->get();
        return view('domains.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_domaine' => 'required|unique:domains|max:255',
            'cout_annuel' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
        ]);

        $domain = new Domain;
        $domain->nom_domaine = $validatedData['nom_domaine'];
        $domain->cout_annuel = $validatedData['cout_annuel'];
        $domain->client_id = $validatedData['client_id'];
        $domain->save();

        return redirect()->route('domains.index')->with('success', 'Nom de domaine ajouté avec succès!');
    }

    public function edit(Domain $domain)
    {
        $clients = Client::orderBy('societe')->get();
        return view('domains.edit', compact('domain', 'clients'));
    }

    public function update(Request $request, Domain $domain)
    {
        $validatedData = $request->validate([
            'nom_domaine' => 'required|max:255|unique:domains,nom_domaine,' . $domain->id,
            'cout_annuel' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
        ]);

        $domain->nom_domaine = $validatedData['nom_domaine'];
        $domain->cout_annuel = $validatedData['cout_annuel'];
        $domain->client_id = $validatedData['client_id'];
        $domain->save();

        return redirect()->route('domains.index')->with('success', 'Nom de domaine modifié avec succès!');
    }

    public function destroy(Domain $domain)
    {
       
        $domain->delete();

        return redirect()->route('domains.index')->with('success', 'Nom de domaine supprimé avec succès!');
    }
}