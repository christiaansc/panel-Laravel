<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $hidden = [
        'deleted_at',
        'user_created',
        'updated_at'
    ];


    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
        'status',
        'categoryId'
    ];

    public function category(){
        return $this->belongsTo(Category::class ,'categoryId');
    }
}
