<?php

namespace Database\Seeders;

use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
    	$this->createUser(1, 'Fajar', 'Hamdani', '087786552759', 'fajarhamdani70@gmail.com');
    	$this->createUser(2, 'Admin', 'Zetadigital', '222222222222', 'admin@zetadigital.com');

    	$user = $this->createUser(3, 'Recruiter', 'Zetadigital', '333333333333', 'recruiter@zetadigital.com');

        // $this->createUser(4, 'Member 1', 'Zetadigital', '444444444441', 'member1@zetadigital.com');
    	// $this->createUser(4, 'Member 2', 'Zetadigital', '444444444442', 'member2@zetadigital.com');
    	// $this->createUser(4, 'Member 3', 'Zetadigital', '444444444443', 'member3@zetadigital.com');
    }

    private function createUser($roleId, $firstName, $lastName = null, $phoneNumber, $email)
    {
		$user = new User();
		$user->role_id = $roleId;
		$user->first_name = $firstName;
		$user->last_name = $lastName;
		$user->phone_number = $phoneNumber;
		$user->email = $email;
		$user->password = Hash::make('fajar123');
        $user->api_token = Str::random(80);
		$user->save();

        return $user;
    }
}
