<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Recruiters extends Model
{
    protected $table = 'recruiters';

    protected $fillable = [
        'company_id',
        'first_name',
        'last_name'
    ];

    protected $casts = [
        'company_id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string'
    ];

    public $timestamps = false;

    protected $dates = [
        'updated_at'
    ];


    public function company(){
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function user(){
        return $this->hasOne(User::class);
    }

    public function job(){
        return $this->hasOne(Jobs::class);
    }

    public function fullName(){
        return $this->first_name . ' ' . $this->last_name;
    }
}
