{!! Form::open(array('url'=>'asistencia/','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
	<div class="input-group">
		<input type="date" class="form-control" name="searchText" value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
		</input>
	</div>
</div>
{{Form::close()}}
