<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BlogCategoryRepository
 *
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{
	/**
	 * @return string
	 */
	protected function getModelClass()
	{
		return Model::class;
	}

	/**
	 * Отримати модель для редагування в адмінці
	 *
	 * @param int $id
	 * @return Model
	 */
	public function getEdit($id)
	{
		return $this->startConditions()->find($id);
	}

	/**
	 * Get list of categories for output in list
	 *
	 * @return Collection
	 */
	public function getForComboBox()
	{
		//return $this->startConditions()->all();

		$columns = implode(', ', [
			'id',
			'CONCAT (id, ". ", title) AS id_title',
		]);
		/*$result[] = $this->startConditions()->all();
		$result[] = $this
			->startConditions()
			->select('blog_categories.*',
				\DB::raw('CONCAT (id, ". ", title) AS id_title'))
			->toBase()
			->get();*/

		$result = $this
			->startConditions()
			->selectRaw($columns)
			->toBase()
			->get();

		//dd($result->first());
		return $result;
	}

	/**
	 * Отримати категорії для виводу пагінатором.
	 *
	 * @param int|null $perPage
	 * @return LengthAwarePaginator
	 */
	public function getAllWithPaginate($perPage = null)
	{
		$columns = [
			'id', 'title', 'parent_id'
		];

		$result = $this->startConditions()->select($columns)
			->whereHas('parent_category')
			->with('parent_category')
			->paginate($perPage);

		//dd($result);
		return $result;
	}
}