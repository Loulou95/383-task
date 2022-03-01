<?php


namespace App\Queries;

use App\User;

trait UserQuery
{
    /**
     * This method gets a customer by key value
     * @param string $key
     * @param int|string $value
     * @return object
     */

    public function getListOfUsers(string $key, $value) {
        return User::where($key, $value)->get();
    }
}
