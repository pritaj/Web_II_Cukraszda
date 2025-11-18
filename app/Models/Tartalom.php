<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tartalom extends Model
{
    use HasFactory;

    protected $table = 'tartalom';
    public $timestamps = false;

    protected $fillable = [
        'suti_id',
        'mentes'
    ];

    public function suti()
    {
        return $this->belongsTo(Suti::class, 'suti_id', 'id');
    }
}