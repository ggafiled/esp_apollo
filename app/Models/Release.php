<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    use HasFactory;

    protected $fillable = ['provider_id', 'releases_name', 'file', 'file_size', 'updated_devices'];

    public function provider()
    {
        return $this->belongsTo('App\Models\Provider', 'provider_id', 'id');
    }
}