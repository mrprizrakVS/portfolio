<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'recruiter_id',
        'title',
        'description'
    ];

    protected $casts = [
        'recruiter_id' => 'integer',
        'title' => 'string',
        'description' => 'string'
    ];
}
