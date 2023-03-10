<?php

namespace App\Services;

use App\Http\Requests\ClientStoreRequest;
use App\Models\Client;

class ClientService {
    public function storeClient(ClientStoreRequest $request, Client $client) {
        $client->first_name = $request->input('first_name');
        $client->last_name = $request->input('last_name');
        $client->email = $request->input('email');
        $client->phone_number = $request->input('phone_number');
        $client->date_of_birth = $request->input('date_of_birth');
        $client->save();
    }
}
