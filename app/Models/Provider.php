<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = ['id','user_id', 'provider_key', 'provider_secret_key', 'releases_current_version', 'provider_name'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id', 'user_id');
    }

    public function releases()
    {
        return $this->hasMany('App\Models\Release', 'provider_id', 'id');
    }
}