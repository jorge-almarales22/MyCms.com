<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;

    protected $date = ['deleted_at'];
    protected $table = 'categories';
    protected $hidden = ['created_at', 'updated_at'];  

    public function products()  
    {
    	return $this->hasMany(Product::class);
    }
}
