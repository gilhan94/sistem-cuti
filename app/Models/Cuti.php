<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    function pengaju()
    {
        return $this->hasOne(User::class, "id", "user");
    }

    function jenis_cuti()
    {
        return $this->hasOne(JenisCuti::class, "id", "jenis_cuti");
    }
}
