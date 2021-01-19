<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HiredUser;
use Illuminate\Http\Request;

class HiredUserController extends Controller
{
    public function index()
    {
        $hiredUsers = HiredUser::with(['recruiter.user', 'user'])->get();

        return view('backend.hired-users.index', compact('hiredUsers'));
    }

    public function destroy($id)
    {
        $hiredUser = HiredUser::find($id);

		if ($hiredUser) {
			$hiredUser->delete();

            return redirect()->route('backend.hiredUsers.index')->with('success', 'Delete success!');            
		} 

        return redirect()->route('backend.hiredUsers.index')->with('failed', 'Delete failed!');
    }
}
