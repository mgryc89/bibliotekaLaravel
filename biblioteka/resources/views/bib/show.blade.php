@extends('master')
@section('srodek')

<h3 class="marginBottom">Szczegóły</h3>

<div class="row">
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-2"><b>Autor: </b></div>
			<div class="col-md-9">{{ $ksiazka->autor }} </div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-2"><b>Tytuł: </b></div>
			<div class="col-md-9">{{ $ksiazka->tytul }} </div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-2"><b>Opis: </b></div>
			<div class="col-md-9">{{ $ksiazka->opis }} </div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-2"><b>Rok wydania: </b></div>
			<div class="col-md-9">{{ $ksiazka->rok_wyd }} </div>
		</div>
		<hr>
	</div>
	<div class="col-md-3">
		<div class="row ">
			<div class="panel panel-default">
				<div class="panel-heading">Funkcje</div>
			    <div class="panel-body">
			    	<div class="col-md-6 text-center">
							<a href="{{ route('biblioteka.edit', $ksiazka->id) }}">
								<span class="btn btn-warning">Edit</span>
							</a>	
					</div>
					<div class="col-md-6 text-center">
						{!! Form::open(['route'=>['biblioteka.destroy',$ksiazka->id], 'method'=>'delete'])!!}
							{!! Form::submit('Usuń',['class'=>'btn btn-danger'])!!}
						{!! Form::close() !!}	
					</div>
			    </div>
			</div>
			

			
		</div>
	</div>
</div>





@stop