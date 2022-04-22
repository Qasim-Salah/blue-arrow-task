<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note as NoteModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    public function index()
    {
        $notes = NoteModel::latest()->take(4)->get();

        return view('index', ['notes' => $notes]);

    }

}
