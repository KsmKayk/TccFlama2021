<?php

namespace App\Providers;


use App\Models\{User, UserAddress, UserClient};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserCreator
{
    public function create(array $data)
    {
        DB::beginTransaction();
        $this->createUserAddress($data);
        DB::commit();
    }

    private function createUserAddress(array $data)
    {
        $userAddress = UserAddress::create([
            'zip_code' => $data['zip_code'],
            'street' => $data['street'],
            'complement' => $data['complement'],
            'neighborhood' => $data['neighborhood'],
            'city' => $data['city'],
            'state' => $data['state'],
            'house_number' => $data['house_number'],
        ]);
        $data['address_id'] = $userAddress->id;
        $this->createUser($data);
    }

    private function createUser(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $this->createUserClient($data, $user);
        Auth::login($user);
    }

    private function createUserClient(array $data, User $user)
    {
        UserClient::create([
            'user_id' => $user->id,
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'address_id' => $data['address_id'],
        ]);
    }
}
