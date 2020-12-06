<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicelist extends Model
{
    protected $table = 'servicelists';
    protected $fillable = ['serv_cat_id','title','description','price','duration'];
    
    public function service_category()
    {
        return $this->belongsTo(Servicecategory::class, 'serv_cat_id', 'id');
    }
}
