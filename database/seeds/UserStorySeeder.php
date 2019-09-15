<?php

use App\Models\Role;
use App\Models\User;

class UserStorySeeder extends BaseSeeder
{
    /**
     * Credentials
     */
    const ADMIN_CREDENTIALS = ['admin@admin.com', 'secret'];

    public function runFake()
    {
        $user = new User();
        $user->name = $this->faker->name;
        $user->phone = $this->faker->phoneNumber;
        $user->login = self::ADMIN_CREDENTIALS[0];
        $user->password = self::ADMIN_CREDENTIALS[1];
        $user->save();
    }
}
