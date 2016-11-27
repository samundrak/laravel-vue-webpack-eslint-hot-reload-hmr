<?php

namespace App\Profiyo\Service;

use App\Profiyo\Entities\User as UserModel;

class User
{
    /**
     * @var UserModel|User
     */
    private $user;

    /**
     * User constructor.
     * @param UserModel $user
     */
    public function __construct(UserModel $user)
    {

        $this->user = $user;
    }

    /**
     * @param array $data
     * @return static
     */
    public function register(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->user->create($data);
    }

    /**
     * @param $user
     * @return mixed
     */
    public function find($user)
    {
        return $this->user->find($user);
    }

    public function update($all, $userId)
    {
        return dd($this
            ->user
            ->where('id', $userId)
            ->update($all));
    }
}