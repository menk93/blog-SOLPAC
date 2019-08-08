<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'inactive'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'categories';

}
