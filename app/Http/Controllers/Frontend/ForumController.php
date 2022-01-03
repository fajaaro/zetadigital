<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use App\Models\ForumReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::all();

        return view('frontend.forum.index', compact('forums'));
    }

    public function store(Request $request)
    {
        $forum = new Forum();
        $forum->user_id = Auth::id();
        $forum->title = $request->title;
        $forum->content = nl2br($request->content);
        $forum->save();

        return back()->with('success', 'Berhasil menambah forum!');
    }

    public function reply(Request $request)
    {
        $reply = new ForumReply();
        $reply->forum_id = $request->forum_id;
        $reply->user_id = Auth::id();
        $reply->content = $request->content;
        $reply->save();

        return back()->with('success', 'Komentar berhasil ditambahkan!');        
    }
}
