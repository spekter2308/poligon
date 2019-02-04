@php
	/** @var \App\Models\BlogCategory $item */
	/** @var \Illuminate\Database\Eloquent\Collection $categoryList */
@endphp

<div class="d-flex flex-column justify-content-center">
	<div class="card">
		<div class="card-body">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основні дані</a>
				</li>
			</ul>
			<br>
			<div class="tab-content">
				<div class="tab-pane active" id="maindata" role="tabpanel">
					<div class="form-group">
						<label for="title">Заголовок</label>
						<input name="title" value="{{ $item->title }}"
							   id="title"
							   type="text"
							   class="form-control"
							   minlength="3"
							   required>
					</div>

					<div class="form-group">
						<label for="slug">Ідентифікатор</label>
						<input name="slug" value="{{ $item->slug }}"
							   id="slug"
							   type="text"
							   class="form-control">
					</div>

					<div class="form-group">
						<label for="parent_id">Надкатегорія</label>
						<select name="parent_id"
							   id="parent_id"
							   class="form-control"
							   placeholder="Виберіть категорію">
							@foreach($categoryList as $categoryOption)
								<option value="{{ $categoryOption->id }}"
									@if($categoryOption->id == $item->parent_id) selected @endif>
									{{ $categoryOption->id }}. {{ $categoryOption->title }}
								</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="description">Опис</label>
						<textarea class="form-control"
								  id="description"
								  rows="3">{{ old('description', $item->description) }}
						</textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>