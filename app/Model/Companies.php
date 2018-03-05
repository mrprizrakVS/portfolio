<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'name',
        'description'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function recruiters(){
        return $this->hasOne(Recruiters::class);
    }
}
