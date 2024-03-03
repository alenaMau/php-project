<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    use HasFactory;

    protected $table = 'telephone';

    public $timestamps = false;
    protected $fillable = [
        'number_telephone',
        'id_room',
        'id_subdivision'
    ];

}