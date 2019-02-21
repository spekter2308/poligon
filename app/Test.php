<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $guarded = [];

    public function test_additional()
	{
		return $this->hasOne(TestAdditional::class);
	}

	public function roles()
	{
		return $this->hasMany(TestRoles::class);
	}
}
