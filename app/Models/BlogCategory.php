<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'title',
		'slug',
		'parent_id',
		'description'
	];


	public function sub_category()
	{
		return $this->belongsTo(self::class, 'parent_id', 'id');
	}

	public function parent_category()
	{
		return $this->hasMany(self::class, 'id', 'parent_id');
	}


}
