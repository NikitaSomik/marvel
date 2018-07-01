<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperHero extends Model
{
    protected $table = 'superheroes';
    protected $fillable = ['user_id', 'nickname', 'real_name', 'origin_description', 'superpowers', 'catch_phrase', 'image'];
}
