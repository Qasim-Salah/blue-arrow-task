<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'content' => $this->content,
            'type' => $this->type,
            'image' => $this->image,
            'user_id' => $this->user_id,
            'created_at'=>$this->created_at
        ];
    }
}
