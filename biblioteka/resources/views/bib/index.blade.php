@extends('master')
@section('srodek')

<div class="container">

	<h3 class="marginBottom">Biblioteka</h3>

	<div class="row marginBottom">
		<a href="{{ route('biblioteka.create') }}" class="btn btn-primary">Dodaj nową książkę</a>
	</div>

	<div class="row">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Autor</th>
					<th>Tytuł</th>
					<th>Rok wydania</th>
					<th>Opis/Szczegóły</th>
					<th>Edycja</th>
					<th>Usuń</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($ksiazki as $book)
					<tr>
						<td>{{ $book->autor }}</td>
						<td>{{ str_limit($book->tytul , $limit=10) }}</td>
						<td>{{ $book->rok_wyd }}r.</td>
						<td>
							<a href="{{ route('biblioteka.show', $book->id) }}">
								<span class="btn btn-xs btn-default">Opis/Szczegóły</span>
							</a>
						</td>
						<td>
							<a href="{{ route('biblioteka.edit', $book->id) }}">
								<span class="btn btn-xs btn-warning">Edit</span>
							</a>
						</td>
						<td>
							{!! Form::open(['route'=>['biblioteka.destroy',$book->id], 'method'=>'delete'])!!}
								{!! Form::submit('Usuń',['class'=>'btn btn-xs btn-danger'])!!}
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				
			</tbody>
		</table>
	</div> {{-- end row --}}

{!! $ksiazki->render() !!}

</div> {{-- end container --}}


@stop