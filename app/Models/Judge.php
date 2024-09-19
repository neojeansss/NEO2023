<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    use HasFactory;

    protected $table = 'judges';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];
    protected $fillable = [
        'name', 'role', 'message', 'picture', 'is_active'
    ];
}
