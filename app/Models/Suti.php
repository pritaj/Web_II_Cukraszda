<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suti extends Model
{
    use HasFactory;

    protected $table = 'suti';
    public $timestamps = false;

    protected $fillable = [
        'nev',
        'tipus',
        'dijazott'
    ];

    public function tartalom()
    {
        return $this->hasMany(Tartalom::class, 'suti_id', 'id');
    }

    public function arak()
    {
        return $this->hasMany(Ar::class, 'suti_id', 'id');
    }
}