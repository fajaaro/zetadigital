<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $query = User::with(['recruiter', 'appliedJobs'])
        			->join('roles', 'users.role_id', '=', 'roles.id')
                    ->select('users.*', 'roles.name as role_name');
        
        if ($user->inRole('admin')) {
            $query->where('users.role_id', '>', '2');
        }

        $users = $query->get();

        return view('backend.users.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);

		if ($user) {
            Storage::delete($user->image_profile_path);

			$user->delete();

            return redirect()->route('backend.users.index')->with('success', 'Success delete user!');            
		} 

        return redirect()->route('backend.users.index')->with('failed', 'Failed to delete user!');
    }
}
