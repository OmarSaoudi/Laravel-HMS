@extends('layouts.master')

@section('title')
    Show Doctor
@stop

@section('css')

@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Show Doctor
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('doctors.index') }}">Doctors</a></li>
        <li class="active">Show Doctor</li>
    </ol>
    </section>

    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset('attachments/doctors_images/'.$doctors->doctors_images) }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $doctors->name }}</h3>

              <p class="text-muted text-center">{{ $doctors->specialist->name }}</p>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

              <p class="text-muted">
                {{ $doctors->email }}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

              <p class="text-muted">{{ $doctors->address }}</p>

              <hr>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Informations</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Doctor's Name</label>
                    <div class="col-sm-4">
                      <input type="text" value="{{ $doctors->name }}" class="form-control" readonly>
                    </div>
                    <label for="inputName" class="col-sm-2 control-label">Date Of Birth</label>
                    <div class="col-sm-4">
                      <input type="text" value="{{ $doctors->date_birth }}" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Degree</label>
                    <div class="col-sm-4">
                      <input type="text" value="{{ $doctors->degree }}"  class="form-control" readonly>
                    </div>
                    <label for="inputName" class="col-sm-2 control-label">Joining Date</label>
                    <div class="col-sm-4">
                      <input type="text" value="{{ $doctors->joining_date }}"  class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">

                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Specialist</label>
                    <div class="col-sm-4">
                      <input type="text" value="{{ $doctors->specialist->name }}"  class="form-control" readonly>
                    </div>
                    <label for="inputName" class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-4">
                      <input type="text" value="{{ $doctors->phone }}"  class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Department</label>
                    <div class="col-sm-4">
                      <input type="text" value="{{ $doctors->department->name }}"  class="form-control" readonly>
                    </div>
                    <label for="inputName" class="col-sm-2 control-label">Blood</label>
                    <div class="col-sm-4">
                      <input type="text" value="{{ $doctors->blood->name }}"  class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nationalitie</label>
                    <div class="col-sm-4">
                      <input type="text" value="{{ $doctors->nationalitie->name }}"  class="form-control" readonly>
                    </div>
                    <label for="inputName" class="col-sm-2 control-label">Gender</label>
                    <div class="col-sm-4">
                      <input type="text" value="{{ $doctors->gender->name }}"  class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-4">
                      <input type="text" value="{{ $doctors->address }}"  class="form-control" readonly>
                    </div>
                    <label for="inputName" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-4">
                        @if ($doctors->status === 'A')
                        <input type="text" placeholder="Active" class="form-control" readonly>
                        @else
                        <input type="text" placeholder="Not Active"  class="form-control" readonly>
                        @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Note</label>
                    <div class="col-sm-10">
                        <textarea name="note" class="form-control" readonly>{{ $doctors->note }}</textarea>
                    </div>
                  </div>
                  <div class="form-group" style="text-align: center">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="{{ route('doctors.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

  </div>
<!-- /.content-wrapper -->

@endsection

@section('scripts')

@endsection
