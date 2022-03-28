<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FRating extends Model
{
    use HasFactory;

    protected $fillable = ['rating'];
}
