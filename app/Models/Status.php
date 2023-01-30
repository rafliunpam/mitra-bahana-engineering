<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function billing()
    {
        return $this->belongsTo(Billing::class);
    }
}
