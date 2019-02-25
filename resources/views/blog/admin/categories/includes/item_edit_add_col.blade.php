@php
	/** @var \App\Models\BlogCategory $item */
@endphp

<div class="card has-text-centered">
	<div class="card-content">
		<div class="field">
			<div class="control has-text-centered">
				<button type="submit" class="button is-link">Зберегти</button>
			</div>
		</div>

		<br>
		@if($item->exists)
			<ul class="list-unstyled">
				<li>
					ID: {{ $item->id }}
				</li>
			</ul>
			<br>

			<div class="field">
				<label class="label" for="created_at">Створено</label>

				<div class="control">
					<input type="text" class="input has-text-centered" name="created_at" value="{{ $item->created_at }}" disabled>
				</div>
			</div>

			<div class="field">
				<label class="label" for="updated_at">Змінено</label>

				<div class="control">
					<input type="text" class="input has-text-centered" name="updated_at" value="{{ $item->updated_at }}" disabled>
				</div>
			</div>

			<div class="field">
				<label class="label" for="deleted_at">Видалено</label>

				<div class="control">
					<input type="text" class="input has-text-centered" name="deleted_at" value="{{ $item->deleted_at }}" disabled>
				</div>
			</div>
			<br>
		@endif
	</div>
</div>