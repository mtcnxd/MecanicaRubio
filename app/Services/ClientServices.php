<?php

namespace App\Services;

use App\Models\Client;

class ClientServices
{
    public function create(array $data) : Client
    {
        $exists = Client::where('phone', $data['phone'])->first();

        if ($exists){
            throw new \Exception('El número de teléfono ya esta registrado');
        }

        return Client::create($data);
    }

    public function update(Client $client, array $data) : Client
    {
        $client->update($data);

        return $client;
    }

    public function delete(Client $client) : void
    {
        $this->update($client, [
            'status' => 'Eliminado'
        ]);
    }
}