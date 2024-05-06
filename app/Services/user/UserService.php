<?php

namespace App\Services\user;

use App\dataTransferObjects\UserDto;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserService
{

    public function getAllUsers()
    {
        try {
            return User::all();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function insertUser(UserDto $dto)
    {
        try {
            return User::create([
                'name' => $dto->name,
                'email' => $dto->email,
                'password' => $dto->password,
                'user_created' => Auth::user()->id,
            ]);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function delete($user)
    {

        try {
            $user->delete();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function update($data , $user)
    {
        try {
            $user->update([
                'name' => $data['name'],
            ]);

            if (isset($data['role'])) {
                $user->roles()->sync($data['role']);
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
