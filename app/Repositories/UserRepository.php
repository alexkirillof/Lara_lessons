<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository
{
    public function getBySocialId($user, string $socName)
    {
        $ownUser = User::query()
            ->where('id_in_soc', $user->getId())
            ->where('type_auth', $socName)
            ->first();

        if (is_null($ownUser)) {
            $ownUser = new User();
            $ownUser->fill([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => null,
                'id_in_soc' => $user->getId(),
                'type_auth' => $socName,
                'avatar' => $user->getAvatar(),
            ])->save();
        }
        return $ownUser;
    }
}
