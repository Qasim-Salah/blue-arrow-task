<?php

namespace App\Http\Controllers;


use App\Models\Note as NoteModel;
use App\Models\User as UserModel;

class UserController extends Controller
{

    public function index()
    {
        $users = UserModel::latest()->paginate(PAGINATION_COUNT);

        return view('users.index', ['users' => $users]);

    }

    public function show($id)
    {
        $user = UserModel::findOrFail($id);

        return view('users.show', ['user' => $user]);
    }

    public function usersNotes($id)
    {
        $notes = NoteModel::where('user_id', $id)->paginate(PAGINATION_COUNT);

        return view('users.notes', ['notes' => $notes]);
    }
}
