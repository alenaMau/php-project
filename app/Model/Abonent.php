<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonent extends Model
{
    use HasFactory;

    protected $table = 'subscriber';

    public $timestamps = false;
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'date_of_birth',
        'id_subdivision'
    ];
}