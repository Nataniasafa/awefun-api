<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailModule extends Model
{
    protected $table = "detail_module" ; 
    
    protected $fillable = [
        'category_id',
        'date',
        'img',
        'title',
        'description',
        'link_url',
     ];
}
