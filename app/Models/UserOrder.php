<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    protected $fillable = ['reference', 'store_id', 'items'];
    use HasFactory;

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function store(){

        return $this->belongsTo(Store::class);
    }

    public function stores(){

        return $this->belongsToMany(Store::class);
    }
}
