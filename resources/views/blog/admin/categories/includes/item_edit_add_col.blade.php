@php
	/** @var \App\Models\BlogCategory $item */
@endphp
<div class="d-flex flex-column text-center">
	<div class="card">
		<div class="card-header">
			<div class="button">
				<button type="submit" class="btn btn-primary">Зберегти</button>
			</div>
		</div>
	</div>
	<br>
	@if($item->exists)
		<div class="card">
			<div class="card-body">
				<ul class="list-unstyled">
					<li>
						ID: {{ $item->id }}
					</li>
				</ul>
				<br>
				<div class="form-group">
					<label for="title">Створено</label>
					<input type="text" value="{{ $item->created_at }}" class="form-control" disabled>
				</div>
				<div class="form-group">
					<label for="title">Змінено</label>
					<input type="text" value="{{ $item->updated_at }}" class="form-control" disabled>
				</div>
				<div class="form-group">
					<label for="title">Видалено</label>
					<input type="text" value="{{ $item->deleted_at }}" class="form-control" disabled>
				</div>
			</div>
		</div>
		<br>
	@endif
</div>