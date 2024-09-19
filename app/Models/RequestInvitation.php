<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestInvitation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'request_invitations';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];
}
