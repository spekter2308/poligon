<?php
namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogPostRepository extends CoreRepository
{
	protected function getModelClass()
	{
		return Model::class;
	}
}