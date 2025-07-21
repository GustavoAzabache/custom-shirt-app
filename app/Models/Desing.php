<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desing extends Model
{
    protected $fillable = ['name', 'route', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
