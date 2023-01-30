<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory, HasFactory, Notifiable;

    protected $guarded = ['id'];

    public function proyeks()
    {
        return $this->hasMany(Proyek::class);
    }

    public function tiket()
    {
        return $this->hasMany(Tiket::class);
    }

    public function donesale()
    {
        return $this->hasMany(Donesale::class);
    }
}
