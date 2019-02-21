<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestAdditional extends Model
{
    protected $guarded = [];

    public function test()
	{
		return $this->belongsTo(Test::class);
	}
}
