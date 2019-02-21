<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestRoles extends Model
{
    protected $guarded = [];

    public function tests()
	{
		return $this->belongsToMany(Test::class);
	}
}
