<?php

namespace Angkee\Admin\Database;

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counts = User::count();
        if ($counts == 0) {
            \DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('admin'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
