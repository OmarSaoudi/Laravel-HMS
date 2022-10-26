@extends('layouts.master')

@section('title')
    Doctors
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Doctors
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Doctors</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Doctors List <small>{{ $doctors->count() }}</small></h3>
            <br><br>
            <a href="doctors/create" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Specialist</th>
                <th>Blood</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($doctors as $doctor)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td><a href="{{ route('DownloadAttachment', $doctor->doctors_images ) }}"><img src="{{ URL::asset('attachments/doctors_images/'.$doctor->doctors_images) }}" height="50px" width="60px"></a></td>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->department->name }}</td>
                <td>{{ $doctor->specialist->name }}</td>
                <td>{{ $doctor->blood->name }}</td>
                <td>{{ $doctor->phone }}</td>
                <td>
                    @if($doctor->status == 'A') Active
                    @else Inactive
                    @endif
                </td>
                <td>
                  <a href="{{ route('doctors.edit',$doctor->id) }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-info btn-sm" href="{{ route('doctors.show',$doctor->id) }}"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteDoctor{{ $doctor->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @include('pages.doctors.delete')
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Specialist</th>
                <th>Blood</th>
                <th>Phone</th>
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
