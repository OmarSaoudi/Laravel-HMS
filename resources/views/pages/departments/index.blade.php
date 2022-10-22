@extends('layouts.master')

@section('title')
    Departments
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Departments
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Departments</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Departments List <small>{{ $departments->count() }}</small></h3>
            <br><br>
            <a class="btn btn-success" data-toggle="modal" data-target="#AddDepartment"><i class="fa fa-plus"></i> Add</a>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Note</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($departments as $department)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $department->name }}</td>
                <td>
                    @if ($department->status === 1)
                        <label class="badge badge-success">Active</label>
                    @else
                        <label class="badge badge-danger">Not Active</label>
                    @endif
                </td>
                <td>{{ $department->note }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{ $department->id }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $department->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <!-- Edit -->
               <div class="modal fade" id="edit{{ $department->id }}">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title">Department Update</h4>
                     </div>
                    <div class="modal-body">
                     <form action="{{ route('departments.update', 'test') }}" method="POST">
                      {{ method_field('PATCH') }}
                      @csrf
                        <div class="form-group">
                          <input type="hidden" name="id" id="id" value="{{ $department->id }}">
                          <label>Department Name Arabic</label>
                          <input type="text" name="name" id="name" value="{{ $department->getTranslation('name', 'ar') }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Department Name English</label>
                          <input type="text" name="name_en" id="name_en" value="{{ $department->getTranslation('name', 'en') }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            @if ($department->status === 1)
                              <label>Status</label><br>
                              <input type="checkbox" class="minimal" name="status" checked>
                            @else
                              <label>Status</label><br>
                              <input type="checkbox" class="minimal" name="status">
                            @endif
                        </div>
                        <div class="form-group">
                          <label>Note</label>
                          <input type="text" name="note" id="note" value="{{ $department->note }}" class="form-control">
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
                <div class="modal fade" id="delete{{ $department->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Delete Department</h4>
                        </div>
                       <div class="modal-body">
                        <form action="{{ route('departments.destroy', 'test') }}" method="POST">
                            {{ method_field('Delete') }}
                            @csrf
                            <div class="modal-body">
                                <p>Are sure of the deleting process ?</p><br>
                                <input id="id" type="hidden" name="id" class="form-control" value="{{ $department->id }}">
                                <input class="form-control" name="name" value="{{ $department->name }}" type="text" readonly>
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
                <th>Name</th>
                <th>Status</th>
                <th>Note</th>
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

<!-- Add Department -->
  <div class="modal fade" id="AddDepartment">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
              <h4 class="modal-title">Add Department</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('departments.store') }}" method="post">
              @csrf
                <div class="form-group">
                  <label>Department Name Arabic</label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                  <label>Department Name English</label>
                  <input type="text" name="name_en" id="name_en" class="form-control">
                </div>
                <div class="form-group">
                  <label>Note</label>
                  <input type="text" name="note" id="note" class="form-control">
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
<!-- End Add Department -->

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
