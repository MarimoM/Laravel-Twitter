<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [ 
        'text', 'sender_id', 'message_id'
    ];
}
