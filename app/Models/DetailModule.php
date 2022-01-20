<?php

namespace App\Models;
use App\Http\controlers\DetailModuleController;
use App\Http\controlers\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailModule extends Model
{
    protected $table = "detail_module" ; 
    
    protected $fillable = [
       
        'date',
        'url_image',
        'title',
        'description',
        'link_url',
     ];
     public function category(){
        return $this->belongsTo(Category::class);
    }
}
