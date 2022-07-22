<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersApiModel extends Model
{
    use HasFactory;
    public $table = 'biodata';
    public $primaryKey = 'id';
    public $fillable =
    [
        'nama', 'alamat',  'phone', 'ttl', 'pendidikan', 'email'
    ];
}
