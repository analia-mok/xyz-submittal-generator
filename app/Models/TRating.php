<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TRating extends Model
{
    use HasFactory;

    protected $fillable = ['rating'];
}
