<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function cancle()
    {
        return $this->hasOne(Cancle::class);
    }


    public function proyek()
    {
        return $this->hasOne(Proyek::class);
    }

    public function donesale()
    {
        return $this->belongsTo(Donesale::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
