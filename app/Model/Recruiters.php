<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Recruiters extends Model
{
    protected $table = 'recruiters';

    protected $fillable = [
        'company_id',
        'first_name',
        'last_name'
    ];

    public $timestamps = false;

    protected $dates = [
        'updated_at'
    ];


    public function company(){
        return $this->belongsTo(Companies::class, 'company_id');
    }
}
