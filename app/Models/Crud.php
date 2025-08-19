<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $table = 'crud';
    
    protected $fillable = [
        'text',
        'radio_group',
        'checkbox',
        'select_field',
        'date',
        'file',
        'textarea'
    ];

}
