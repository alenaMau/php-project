<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_of_room extends Model
{
    use HasFactory;

    protected $table = 'type_of_room';

    public $timestamps = false;
    protected $fillable = [
        'type'
    ];

}