<?php

namespace App\Services;

use App\Http\Requests\ClientStoreRequest;
use App\Mail\NewUserAccountMail;
use App\Models\Client;
use App\Models\ClientProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ClientService {
    public function storeClient(ClientStoreRequest $request, Client $client) {
        DB::transaction(function() use ($request, $client) {
            $client->first_name = $request->input('first_name');
            $client->last_name = $request->input('last_name');
            $client->email = $request->input('email');
            $client->phone_number = $request->input('phone_number');
            $client->date_of_birth = $request->input('date_of_birth');
            $client->save();

            // Client ID = $client->id // 1
            // [1, 2] - product ids
            $productIds = $request->input('product_ids'); // [1, 2] ili null
            if($productIds === null) $productIds = []; // za slucaj da nista nije cekirano

            ClientProduct::where('client_id', '=', $client->id)
                ->whereNotIn('product_id', $productIds)
                ->delete();

            foreach ($productIds as $id) {
                ClientProduct::updateOrCreate(
                    ['client_id' => $client->id, 'product_id' => $id]
                );
            }
        });

        $mail = new NewUserAccountMail($client->first_name); // napravili mejl
        Mail::to($client->email)->send($mail); // poslali napravljen mejl
    }
}
