<?php
namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BlogPostRepository
 *
 * @package App\Repositories
 */
class BlogPostRepository extends CoreRepository
{
	/**
	 * @return string
	 */
	protected function getModelClass()
	{
		return Model::class;
	}

	/**
	 * Отримати список постів для виводу в списку (адмінка)
	 *
	 * @param $perPage
	 * @return LengthAwarePaginator
	 */
	public function getAllWithPaginate($perPage)
	{
		$columns = [
			'id', 'title', 'slug', 'is_published', 'published_at', 'user_id', 'category_id'
		];

		$result = $this->startConditions()
			->select($columns)
			->orderBy('id', 'DESC')
			->paginate($perPage);

		return $result;
	}
}