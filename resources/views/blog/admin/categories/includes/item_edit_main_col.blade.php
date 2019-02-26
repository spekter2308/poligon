@php
	/** @var \App\Models\BlogCategory $item */
	/** @var \Illuminate\Database\Eloquent\Collection $categoryList */
@endphp

<div class="d-flex flex-column justify-content-center">
	<div class="card">
		<div class="card-content">
			<div class="tabs">
				<ul>
					<li class="is-active"><a>Основні дані</a></li>
				</ul>
			</div>
			<br>
			<div class="tab-content">
				<div class="tab-panel active" id="maindata" role="tabpanel">

					<div class="field">
						<label class="label" for="title">Заголовок</label>

						<div class="control">
							<input type="title"
								   class="form-control"
								   name="title"
								   value="{{ $item->title }}">
						</div>
					</div>

					<div class="field">
						<label class="label" for="slug">Ідентифікатор</label>

						<div class="control">
							<input type="slug"
								   class="form-control"
								   name="slug"
								   value="{{ $item->slug }}">
						</div>
					</div>

					<div class="field">
						<label class="label" for="parent_id">Надкатегорія</label>
						<div class="control">
							<div class="select is-fullwidth">
								<select name="parent_id"
										id="parent_id"
										class="form-control"
										placeholder="Виберіть категорію">
									@foreach($categoryList as $categoryOption)
										<option value="{{ $categoryOption->id }}"
												@if($categoryOption->id == $item->parent_id) selected @endif>
											{{ $categoryOption->id_title }}
										</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>


					<div class="field">
						<label class="label" for="description">Опис</label>

						<div class="control">
							<textarea name="description"
									  class="textarea"
									  id="description"
									  rows="3">{{ old('description', $item->description) }}
							</textarea>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

