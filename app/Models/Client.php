<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'societe',
        'nom',
        'prenom'
    ];

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }
}