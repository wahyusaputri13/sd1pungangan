<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogComplaint extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function report()
    {
        return $this->belongsTo(Complaint::class, 'complaint_id', 'id');
    }

}
