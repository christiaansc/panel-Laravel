<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden = [
        'deleted_at',
        'user_created',
        'updated_at'
    ];


    protected $fillable = [
        'name',
        'description',
        'status',
        'user_created',
        'user_deleted'
    ];
}
