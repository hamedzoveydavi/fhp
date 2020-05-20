<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Profile extends Model
{
    use Notifiable;

    protected $fillable = [
        'Username' , 'Percode' , 'Name','Family','Ncode','Station','Unit','Position','Img'
    ];

   }
