<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{

	/*public function __construct()
	{
		$this->middleware('auth');
	}*/

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = BlogCategory::paginate(8);

        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$item = new BlogCategory();
		$categoryList = BlogCategory::all();

		return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BlogCategoryCreateRequest
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
		$data = $request->input();
		if(empty($data['slug'])){
			$data['slug'] = str_slug($data['title']);
		}

		$item = (new BlogCategory())->create($data);

		if($item){
			return redirect()->route('blog.admin.categories.edit', [$item->id])
				->with(['success' => 'Успішно додано']);
		} else {
			return back()->withErrors(['msg' => 'Помилка додавання'])
				->withInput();
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$item = BlogCategory::findOrFail($id);
        $categoryList = BlogCategory::all();
		//dd(collect($item)->pluck('id'));

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BlogCategoryUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
		/*$rules = [
    		'title' => 'required|min:3|max:200',
			'slug' => 'max:200',
			'description' => 'string|min:3|max:500',
			'parent_id' => 'required|integer|exists:blog_categories,id'
		];*/
		//$validated = $request->validate($rules);

		//dd($validated);

		$item = BlogCategory::find($id);

		if(empty($item)){
       	return back()
			->withErrors(['msg' => "Запис id=[{$id}] не знайденo"])
			->withInput();
	   }
	   $data = $request->all();
		if(empty($data['slug'])){
			$data['slug'] = str_slug($data['title']);
		}

       $result = $item
		   ->fill($data)
		   ->save();

       if($result){
       	return redirect()
			->route('blog.admin.categories.edit', $id)
			->with(['success' => "Успішно збережено"]);
	   } else {
       	return back()
			->withErrors(['msg' => "Помилка збереження"])
			->withInput();
	   }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
