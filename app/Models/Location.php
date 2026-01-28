<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'kota',
        'kapasitas',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
