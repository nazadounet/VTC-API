<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersProfilsModel extends Model
{
    protected $table = 'usersProfils';

    protected $fillable = ['firstname', 'lastname', 'sexe'];

}
