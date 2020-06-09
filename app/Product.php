<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $date = ['deleted_at'];
    protected $table = 'products';
    protected $hidden = ['created_at', 'updated_at'];      

    public function category()  
    {
    	return $this->belongsTo(Category::class);
    }
    public function scopeName($query, $name)
    {
    	if($name):
    		return $query->where('name', 'LIKE', "%$name%");
    	endif;
    }
}
