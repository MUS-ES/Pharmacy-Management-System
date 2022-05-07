<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    public function index()
    {
        $users = User::all();
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
