<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Models\Client;
use App\Models\Product;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Pregled svih klijenata
    public function index()
    {
        // $clients = Client::all();
        $clients = Client::paginate(10);

        // Vracamo view, ali sa nekim podacima
        return view('clients.index')->with([
            'clients' => $clients
        ]);
    }

    // Kreiranje novog klijenta
    public function create()
    {
        $products = Product::all();

        return view('clients.create')->with([
            'products' => $products,
        ]);
    }

    // Izmena podatak o klijentu
    // clients-app.test/clients/1/edit
    // $id = 1;
    public function edit(Request $request, Client $client)
    {
        $products = Product::all();

        return view('clients.edit')->with([
            'products' => $products,
            'client' => $client,
        ]);
    }

    // Radi cuvanje podataka u bazu
    public function store(ClientStoreRequest $request)
    {
        $client = new Client();
        $clientService = new ClientService();

        $clientService->storeClient($request, $client);

        return redirect()->route('clients.index');
    }

    // Menjamo podatke u bazi za vec postojeci model
    public function update(ClientStoreRequest $request, Client $client)
    {
        $clientService = new ClientService();
        $clientService->storeClient($request, $client);

        return redirect()->route('clients.index');
    }

    // Brisemo postojeceg klijenta
    public function destroy(Request $request, Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
