<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        "id",
        'societe',
        'nom_domaine',
        'cout_annuel',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}