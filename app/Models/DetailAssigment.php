<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAssigment extends Model
{
    protected $table = "detail_assigment" ; 
    
    protected $fillable = [
        'title',
        'description',
        ];
        
}
