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
        // Create an admin user
        factory(App\Models\User::class)->create([
            'name'         => 'Admin',
            'login'        => static::ADMIN_CREDENTIALS[0],
        ]);

        // Create regular user
        factory(App\Models\User::class)->create([
            'name'         => 'Bob',
            'login'        => 'bob@bob.com',
        ]);

        // Assign fake roles to users
        for ($i = 0; $i < 5; ++$i) {
            factory(App\Models\User::class)->create([]);
        }
    }
}
