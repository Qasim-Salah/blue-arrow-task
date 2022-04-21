<?php

namespace App\Http\Resources;

use App\Enums\NoteType;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'count_notes ' => $this->notes->count(),
            'normal_notes' => $this->notes->where('type', NoteType::Normal->value)->count(),
            'Urgent_Notes' => $this->notes->where('type', NoteType::Urgent->value)->count(),
            'created_at' => $this->created_at,
        ];
    }
}
