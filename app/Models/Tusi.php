<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tusi extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'bidang_id'
    ];
}
