<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\FollowNotification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Str;

class FollowController extends Controller
{
    public function store(Request $request)
    {
        $follower = $request->user();

        $request->validate([
            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
                Rule::unique('followers', 'user_id')->where('follower_id', $follower->id)
            ],
        ]);


        $user_id = $request->post('user_id');
        $user = User::find($user_id);

        $follower->following()->attach($user_id, [
            'id' => Str::uuid()
        ]);

        $user->notify(new FollowNotification($user, $follower));

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'user_id' => 'required|int|exists:users,id'
        ]);

        $follower = $request->user();
        $user_id = $request->post('user_id');

        $follower->following()->attach($user_id, [
            'id' => Str::uuid()
        ]);
    }
}
