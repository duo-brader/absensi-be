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
        "user",
        "waktu",
        "mapel",
        "kelas"
    ];

    function user() : BelongsTo {
        return $this->belongsTo(User::class, "user_id");
    }

    function waktu() : BelongsTo {
        return $this->belongsTo(Waktu::class, "waktu_id");
    }

    function mapel() : BelongsTo {
        return $this->belongsTo(Mapel::class, "mapel_id");
    }

    function kelas() : BelongsTo {
        return $this->belongsTo(Kelas::class, "kelas_id");
    }
}
