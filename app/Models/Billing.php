<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function status()
    {
        return $this->hasMany(Status::class);
    }

}
