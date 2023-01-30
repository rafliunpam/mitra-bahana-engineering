<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->hasMany(Status::class);
    }

    public function billing()
    {
        return $this->hasOne(Billing::class);
    }


    public function donesale()
    {
        return $this->belongsTo(Donesale::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function doneproyek()
    {
        return $this->hasMany(Doneproyek::class);
    }
    
}
