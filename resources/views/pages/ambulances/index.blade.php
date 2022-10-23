@extends('layouts.master')

@section('title')
    Ambulances
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ambulances
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Ambulances</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Ambulances List <small>{{ $ambulances->count() }}</small></h3>
            <br><br>
            <a class="btn btn-success" data-toggle="modal" data-target="#AddAmbulance"><i class="fa fa-plus"></i> Add</a>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Ambulance Name</th>
                <th>Ambulance Number</th>
                <th>Status</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($ambulances as $ambulance)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $ambulance->name }}</td>
                <td>{{ $ambulance->number }}</td>
                <td>
                    @if ($ambulance->status === 1)
                        <label class="badge badge-success">Active</label>
                    @else
                        <label class="badge badge-danger">Not Active</label>
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{ $ambulance->id }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $ambulance->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <!-- Edit -->
               <div class="modal fade" id="edit{{ $ambulance->id }}">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title">Ambulance Update</h4>
                     </div>
                    <div class="modal-body">
                     <form action="{{ route('ambulances.update', 'test') }}" method="POST">
                      {{ method_field('PATCH') }}
                      @csrf
                        <div class="form-group">
                          <input type="hidden" name="id" id="id" value="{{ $ambulance->id }}">
                          <label>Ambulance Name</label>
                          <input type="text" name="name" value="{{ $ambulance->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Ambulance Number</label>
                            <input type="text" name="number" value="{{ $ambulance->number }}" class="form-control" required>
                          </div>
                        <div class="form-group">
                            @if ($ambulance->status === 1)
                              <label>Status</label><br>
                              <input type="checkbox" class="minimal" name="status" checked>
                            @else
                              <label>Status</label><br>
                              <input type="checkbox" class="minimal" name="status">
                            @endif
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save changes</button>
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </form>
                    </div>
                   </div>
                 </div>
               </div>
              <!-- Edit End -->

              <!-- Delete -->
                <div class="modal fade" id="delete{{ $ambulance->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Delete Ambulance</h4>
                        </div>
                       <div class="modal-body">
                        <form action="{{ route('ambulances.destroy', 'test') }}" method="POST">
                            {{ method_field('Delete') }}
                            @csrf
                            <div class="modal-body">
                                <p>Are sure of the deleting process ?</p><br>
                                <input id="id" type="hidden" name="id" class="form-control" value="{{ $ambulance->id }}">
                                <input class="form-control" name="name" value="{{ $ambulance->name }}" type="text" readonly>
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
              <!-- Delete End -->
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Ambulance Name</th>
                <th>Ambulance Number</th>
                <th>Status</th>
                <th>Operation</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<!-- Add Ambulance -->
  <div class="modal fade" id="AddAmbulance">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
              <h4 class="modal-title">Add Ambulance</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('ambulances.store') }}" method="post">
              @csrf
                <div class="form-group">
                  <label>Ambulance Name</label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                  <label>Ambulance Number</label>
                  <input type="text" name="number" id="number" class="form-control">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Save changes</button>
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- End Add Ambulance -->

@endsection




@section('scripts')
<script src="{{ URL::asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
@endsection
