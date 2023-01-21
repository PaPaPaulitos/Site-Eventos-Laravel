<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Event extends Model
{
    
    use HasFactory;
    public $timestamps = false; //by default timestamp true
    const UPDATED_AT = null; //and updated by default null set
    protected $casts = [
        "itens" => 'array'
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

}
