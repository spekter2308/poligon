@extends('layouts.app')

@section('content')
	@php
		/** @var \App\Models\BlogCategory $item */
	@endphp

	@include('errors')
	@include('success')

	@if ($item->exists)
		<form method="POST" action="{{ route('blog.admin.categories.update', $item->id) }}">
		@method('PATCH')
	@else
		<form method="POST" action="{{ route('blog.admin.categories.store') }}">
	@endif

		@csrf
		<div class="task-container columns">
			<div class="column is-three-fifths">
				@include('blog.admin.categories.includes.item_edit_main_col')
			</div>
			<div class="column">
				@include('blog.admin.categories.includes.item_edit_add_col')
			</div>

		</div>
	</form>

@endsection