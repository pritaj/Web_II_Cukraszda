<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ar extends Model
{
    use HasFactory;

    protected $table = 'ar';
    public $timestamps = false;

    protected $fillable = [
        'suti_id',
        'ertek',
        'egyseg'
    ];

    public function suti()
    {
        return $this->belongsTo(Suti::class, 'suti_id', 'id');
    }
}