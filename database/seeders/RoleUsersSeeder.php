<?php

namespace Database\Seeders;

use App\Enums\Users\RoleUsers;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->line("\033[1;35m==============================\033[0m");
        $this->command->line("\033[1;36mStarting to create roles 🎯\033[0m");
        $this->command->line("\033[1;35m==============================\033[0m");

        foreach (RoleUsers::cases() as $role) {
            $created = Role::firstOrCreate([
                'name' => $role->value,
            ]);

            $this->command->line("\033[1;32m✔\033[0m Role \033[1;35m{$created->name}\033[0m has been added!");
        }

        $this->command->info('All roles have been successfully created ✅ \n');
    }
}
