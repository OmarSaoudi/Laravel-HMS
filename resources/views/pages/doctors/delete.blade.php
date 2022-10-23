<!-- Delete Student -->
<div class="modal fade" id="DeleteDoctor{{ $doctor->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Delete Doctor</h4>
    </div>
    <div class="modal-body">
      <form action="{{ route('doctors.destroy','test') }}" method="post">
      @csrf
      {{ method_field('delete') }}
        <div class="modal-body">
          <p>Are sure of the deleting process ?</p><br>
          <input type="hidden" name="id"  value="{{ $doctor->id }}">
          <input class="form-control" name="name" value="{{ $doctor->name }}" type="text" readonly>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Save changes</button>
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>
<!-- End Delete -->
