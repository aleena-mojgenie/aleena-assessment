<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}