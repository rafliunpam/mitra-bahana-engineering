<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTiket extends Model
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


    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }

    public function status_sales_tiket()
    {
        return $this->belongsTo(StatusSalesTiket::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
