<form action="{{ url('/m/reminders/update/'.$active_object->id) }}" method="post">
	<div class="modal fade" id="modal-update-{{ $active_object->id }}">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Update Reminder</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}

					<div class="form-group select-users">
						<label class="form-control-label">Select User <span class="text-danger">*</span></label>
						<select class="select-user" name="user" required>
							@foreach ($users->sortByDesc('id') as $element)
								<option value="{{ $element->id }}" {{ ($element->id == old('user', $active_object->user_id)) ? 'selected' : '' }}>{{ $element->full_name() }} [{{ optional($element->role)->name }}]</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label class="form-control-label">Label <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="label" placeholder="Label" value="{{ $active_object->label }}" >
					</div>

					<div class="form-group">
						<label class="form-control-label form-check form-check-inline">
							<input type="checkbox" name="done" class="form-check-input" value="0" {{ ($active_object->done == 1) ? 'checked' : '' }}> Done?
						</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form>