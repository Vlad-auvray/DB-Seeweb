<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::orderBy('societe');
    
        if ($request->has('search')) {
            $search = $request->search;
            $clients = $clients->where(function ($query) use ($search) {
                $query->where('societe', 'LIKE', "%{$search}%")
                    ->orWhere('nom', 'LIKE', "%{$search}%")
                    ->orWhere('prenom', 'LIKE', "%{$search}%");
            });
        }
    
        if ($request->has('sort')) {
            $sort = $request->sort;
            $direction = $request->has('direction') ? $request->direction : 'asc';
            $clients = $clients->orderBy($sort, $direction);
        }
    
        $clients = $clients->get();
    
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'societe' => 'required|max:255',
        ]);
    
        $client = Client::firstOrCreate([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'societe' => $validatedData['societe'],
        ]);
    
        return redirect()->route('domains.index')->with('success', 'Client ajouté avec succès!');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'societe' => 'required|max:255',
        ]);

        $client = Client::findOrFail($id);
        $client->nom = $validatedData['nom'];
        $client->prenom = $validatedData['prenom'];
        $client->societe = $validatedData['societe'];
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client modifié avec succès!');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès!');
    }
}