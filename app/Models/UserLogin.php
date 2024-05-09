<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    use HasFactory;

    protected $table = 'user_logins';

    protected $fillable = [
        'user_id', 'ip', 'iso_code', 'country', 'city', 'state', 'state_name', 'postal_code', 'latitude', 'longitude',
        'timezone', 'continent', 'default', 'currency'
    ];

    protected $casts = [
        'default' => 'boolean', // Asegura que el campo 'default' se maneje como booleano
    ];

    protected $dates = ['created_at', 'updated_at']; // 'created_at' y 'updated_at' ya son manejados como Carbon por defecto

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
