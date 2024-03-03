<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'room';

    public $timestamps = false;
    protected $fillable = [
        'name',
        'id_type_of_room',
        'id_subdivision'
    ];

}