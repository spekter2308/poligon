@extends('layouts.app')

@section('content')
	<div class="box">
		<nav class="navbar navbar-toggle-toggleleable-md navbar-light bg-faded">
			<a class="btn btn-primary" href="{{route('blog.admin.posts.create') }}">Написати</a>
		</nav>

		<div class="content">
				<table>
					<thead>
					<tr>
						<th>#</th>
						<th>Автор</th>
						<th>Категорія</th>
						<th>Заголовок</th>
						<th>Дата публікації</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						@foreach ($paginator as $post)
							@php
								/** @var \App\Models\BlogPost $post */
							@endphp
							<tr @if(!$post->is_published) style="background-color: #ccc;" @endif>
								<td>{{ $post->id }}</td>
								<td>{{ $post->user_id }}</td>
								<td>{{ $post->category_id }}</td>
								<td>
									<a href="{{ route('blog.admin.posts.edit', $post->id) }}">{{ $post->title }}</a>
								</td>
								<td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M H:i') : '' }}</td>
							</tr>
						@endforeach
					</tr>
					</tbody>
				</table>
		</div>

		@if($paginator->total() > $paginator->count())
			<br>
			<nav class="pagination" role="navigation" aria-label="pagination">
				{{ $paginator->links() }}
			</nav>
		@endif
	</div>

@endsection