<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$no->id}}">
	{{!!Form::open(array('action'=>array('NotasController@destroy',$no->id),'method'=>'delete'))!!}}

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Nota</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Elilimar la Nota</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Aceptar</button>
			</div>
		</div>
	</div>

	{{!!Form::close()!!}}
</div>
