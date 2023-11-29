<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absen extends Model
{
    use HasFactory;
    protected $table = "absens";
    protected $guarded = ["id"];

    protected $with = [
        "user"
    ];

    function user() : BelongsTo {
        return $this->belongsTo(User::class, "user_id");
    }
}
