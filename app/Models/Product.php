<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'user_id',
      'qrcode',
      'price',
      'quantity',
      'imagepath',
      'expirydate',
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }
}
