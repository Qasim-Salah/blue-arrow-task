<?php

namespace App\Http\Controllers\API\V1;

use App\Constants\ErrorCodes;
use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\Note as NoteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class NoteController extends Controller
{
    public function index()
    {
        $notes = NoteModel::all();

        return ResponseBuilder::success(['notes' => NoteResource::collection($notes)]);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|min:10|max:200',
            'type' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif|max:5000'
        ]);

        if ($validator->fails()) {
            return ResponseBuilder::error($validator->errors()->first(), 422, ErrorCodes::VALIDATION);
        }

        $url = '';
        if ($request->has('image')) {
            ###helper###
            $url = upload_image('notes', $request->image);
        }

        NoteModel::create([
            'image' => $url,
            'content' => $request->input('content'),
            'type' => $request->input('type'),
            'user_id' => Auth::id(),
        ]);
            return ResponseBuilder::success(null, 'Added successfully');

    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'content' => 'required|min:10|max:200',
            'type' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5000'
        ]);

        if ($validator->fails()) {
            return ResponseBuilder::error($validator->errors()->first(), 422, ErrorCodes::VALIDATION);
        }

        $note = NoteModel::findOrFail($id);

        if ($note->user_id === Auth::id()) {

            $url = '';
            if ($request->has('image')) {
                ###helper###
                $url = upload_image('notes', $request->file('image'));
            }

            $note->update([
                'image' => $request->has('image') ? $url : $note->image,
                'content' => $request->input('content'),
                'type' => $request->input('type')]);
                return ResponseBuilder::success(null, 'Updated successfully');
        }
            return ResponseBuilder::error('Something went wrong');
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
                return ResponseBuilder::success(null,'Deleted successfully');
            }
        }
            return ResponseBuilder::error('Something went wrong');

    }
}
