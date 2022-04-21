<?php

namespace App\Models;

use App\Enums\NoteType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = "notes";

    protected $fillable = [
        'content',
        'type',
        'image',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getType()
    {
        return $this->type == 0 ? 'Normal' : 'Urgent';
    }

}
