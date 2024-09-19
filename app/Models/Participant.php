<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Participant extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $table = 'participants';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function getAuthIdentifierName()
    {
        return 'id'; // Change to the appropriate identifier column name
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    // Implement the "Remember Me" methods
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function registrationDetail()
    {
        return $this->belongsTo(RegistrationDetail::class);
    }

    public function binusian()
    {
        return $this->hasOne(Binusian::class);
    }
}
