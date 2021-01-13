<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
		$root = new User();
		$root->role_id = 1;
		$root->first_name = 'Fajar';
		$root->last_name = 'Hamdani';
		$root->phone_number = '087786552759';
		$root->email = 'fajarhamdani70@gmail.com';
		$root->password = Hash::make('fajar123');
		$root->save();

		$admin = new User();
		$admin->role_id = 2;
		$admin->first_name = 'Admin';
		$admin->phone_number = '222222222222';
		$admin->email = 'admin@zetadigital.com';
		$admin->password = Hash::make('fajar123');
		$admin->save();

		$recruiter = new User();
		$recruiter->role_id = 3;
		$recruiter->first_name = 'Recruiter';
		$recruiter->phone_number = '333333333333';
		$recruiter->email = 'recruiter@zetadigital.com';
		$recruiter->password = Hash::make('fajar123');
		$recruiter->save();

		$member = new User();
		$member->role_id = 4;
		$member->first_name = 'Member';
		$member->phone_number = '444444444444';
		$member->email = 'member@zetadigital.com';
		$member->password = Hash::make('fajar123');
		$member->save();
    }
}
