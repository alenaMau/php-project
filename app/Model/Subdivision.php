<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdivision extends Model
{
    use HasFactory;

    protected $table = 'subdivision';

    public $timestamps = false;
    protected $fillable = [
        'name',
        'type_of_unit'
    ];

}