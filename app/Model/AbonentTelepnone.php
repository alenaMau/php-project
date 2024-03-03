<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbonentTelepnone extends Model
{
    use HasFactory;

    protected $table = 'abonent_telepnone';

    public $timestamps = false;
    protected $fillable = [
        'id_abonent',
        'id_telepnone'
    ];

}