<?php

namespace App\Http\Controllers;

use App\Models\User;


class PanelController extends Controller
{
    public function index()
    {
        $users = User::orderBy("created_at", "desc")->get();

        return view("admin.panel")->with('users', $users);
    }
    public function activeUser($id)
    {
        $user = User::find($id);
        if ($user)
        {

            $user->active = 1;
            $user->save();
        }
        return $this->index();
    }
    public function deActiveUser($id)
    {
        $user = User::find($id);
        if ($user)
        {
            $user->active = 0;
            $user->save();
        }
        return $this->index();
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user)
        {
            $user->delete();
        }
        return $this->index();
    }
}
