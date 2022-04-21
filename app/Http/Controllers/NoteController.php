<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note as NoteModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NoteController extends Controller
{

    public function index()
    {
        $notes = NoteModel::latest()->paginate(PAGINATION_COUNT);

        return view('notes.index', ['notes' => $notes]);

    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(NoteRequest $request)
    {
        $requests = $request->validated();

        if ($request->has('image')) {
            ###helper###
            $url = upload_image('notes', $request->image);

            $requests['image'] = $url;
        }

        $requests['user_id'] = Auth::id();

        NoteModel::create($requests);

        return redirect()->route('notes.index')->with(['success' => 'Added successfully']);
    }

    public function edit($id)
    {
        $note = NoteModel::findOrFail($id);

        if ($note->user_id === Auth::id()) {

            return view('notes.edit', ['note' => $note]);
        }

        return redirect()->route('notes.index')->with(['error' => 'Something went wrong']);

    }

    public function update($id, NoteRequest $request)
    {
        $note = NoteModel::findOrFail($id);

        $requests = $request->validated();

        if ($note->user_id === Auth::id()) {

            if ($request->has('image')) {
                ###helper###
                $url = upload_image('notes', $request->image);

                $requests['image'] = $url;
            }

            $requests['user_id'] = Auth::id();

            $note->update($requests);

            return redirect()->route('notes.index')->with(['success' => 'Updated successfully']);

        }
        return redirect()->route('notes.edit')->with(['error' => 'Something went wrong']);

    }

    public function destroy($id)
    {
        $note = NoteModel::findOrFail($id);

        if ($note->user_id === Auth::id()) {

            if ($note->image) {

                $image = Str::after($note->image, 'storage/notes');

                $image = public_path('storage/notes' . $image);

                unlink($image); //delete from folder
            }

            if ($note->delete()) {

                return response()->json(['message' => 'Deleted successfully']);
            }
        }
        return response()->json(['message' => 'Something went wrong'],422);
    }
}
