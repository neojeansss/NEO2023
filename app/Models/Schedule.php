<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    
    protected $table = 'schedules';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
