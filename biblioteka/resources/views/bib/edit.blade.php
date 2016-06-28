@extends('master')
@section('srodek')

<h3 class="marginBottom">Edytuj książkę</h3>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		
		@if ($errors->all())
			<div class="alert alert-info">	           
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</div>
		@endif

		{!! Form::model($ksiazka,['route'=>['biblioteka.update',$ksiazka->id], 'method'=>'PUT']) !!}
		    {!! Form::label('autor', 'Autor: ') !!}
		    {!! Form::text('autor', null, ['class'=>'form-control'])  !!}

		    {!! Form::label('tytul', 'Tytuł: ') !!}
		    {!! Form::text('tytul', null, ['class'=>'form-control'])  !!}

		    {!! Form::label('opis', 'Opis: ') !!}
		    {!! Form::textarea('opis', null, ['class'=>'form-control'])  !!}

		    {!! Form::label('rok_wyd', 'Rok wydania: ') !!}
		    {!! Form::number('rok_wyd', null, ['class'=>'form-control'])  !!}


		    {!! Form::submit('Edytuj książkę', ['class'=>'btn btn-primary  btn-block', 'style'=>'margin-top:15px;']) !!}
		{!! Form::close() !!}


		</div>
	</div>
</div>

@stop