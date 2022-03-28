<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;

    public function barrierType()
    {
        return $this->belongsTo(BarrierType::class);
    }

    public function penetrant()
    {
        return $this->belongsTo(Penetrant::class);
    }
}
