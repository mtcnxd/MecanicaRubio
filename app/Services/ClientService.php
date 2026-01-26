<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    public function all()
    {
        return Client::where('status', 'Activo')->get();
    }

    public function find(string $id)
    {
        return Client::find($id);
    }

    public function create(array $data) : Client
    {
        $exists = Client::where('phone', $data['phone'])->first();

        if ($exists){
            throw new \Exception('El número de teléfono ya esta registrado');
        }

        return Client::create($data);
    }

    public function update(string $id, array $data) : Client
    {
        $client = Client::find($id);

        $client->update($data);

        return $client;
    }

    public function delete(string $id) : void
    {
        $client = Client::find($id);

        $client->update([
            'status' => 'Eliminado'
        ]);
    }

    public function findByCriteria(array $criteria)
    {
        return Client::where(function($query) use ($criteria) {
            if (isset($criteria['name'])){
                $query->where('name','LIKE', '%'.$criteria['name'].'%');
            }

            if(isset($criteria['id'])){
                $query->where('id', $criteria['id']);
            }
        })->get();
    }    
}