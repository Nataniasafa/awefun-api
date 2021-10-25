<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListModule extends Model
{
    protected $table = "list_module" ; 
    
    protected $fillable = [
        'label_id', 
        'date',
        'img',
        'title',
        'description', 
     ];
}
