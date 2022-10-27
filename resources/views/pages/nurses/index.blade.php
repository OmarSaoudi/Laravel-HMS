@extends('layouts.master')

@section('title')
    Nurses
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Nurses
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Nurses</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Nurses List <small>{{ $nurses->count() }}</small></h3>
            <br><br>
            <a class="btn btn-success" data-toggle="modal" data-target="#AddNurse"><i class="fa fa-plus"></i> Add</a>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date Of Birth</th>
                <th>Joining Date</th>
                <th>Nationalitie</th>
                <th>Blood</th>
                <th>Status</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($nurses as $nurse)
              <tr>
                <td>{{ $nurse->nur_id }}</td>
                <td><img src="{{ URL::asset('attachments/nurses_images/'.$nurse->nurses_images) }}" height="50px" width="60px"></td>
                <td>{{ $nurse->name }}</td>
                <td>{{ $nurse->email }}</td>
                <td>{{ $nurse->phone }}</td>
                <td>{{ $nurse->address }}</td>
                <td>{{ $nurse->date_birth }}</td>
                <td>{{ $nurse->joining_date }}</td>
                <td>{{ $nurse->nationalitie->name }}</td>
                <td>{{ $nurse->blood->name }}</td>
                <td>
                    @if ($nurse->status === 1)
                        <label class="badge badge-success">Active</label>
                    @else
                        <label class="badge badge-danger">Not Active</label>
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{ $nurse->id }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#show{{ $nurse->id }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $nurse->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <!-- Edit -->
               <div class="modal fade" id="edit{{ $nurse->id }}">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title">Nurse Update</h4>
                     </div>
                    <div class="modal-body">
                     <form action="{{ route('nurses.update', 'test') }}" method="post" enctype="multipart/form-data">
                      {{ method_field('patch') }}
                      @csrf

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="hidden" name="id" id="id" value="{{ $nurse->id }}">
                            <label>Name Arabic</label>
                            <input type="text" name="name" value="{{ $nurse->getTranslation('name', 'ar') }}" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Name English</label>
                              <input type="text" name="name_en" value="{{ $nurse->getTranslation('name', 'en') }}" class="form-control" required>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $nurse->email }}" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Phone</label>
                              <input type="text" name="phone" value="{{ $nurse->phone }}" class="form-control" required>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" value="{{ $nurse->address }}" class="form-control" required>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date Of Birth</label>
                            <input type="date" name="date_birth" value="{{ $nurse->date_birth }}" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Joining Date</label>
                              <input type="date" name="joining_date" value="{{ $nurse->joining_date }}" class="form-control" required>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                               <label>Nationalities</label>
                               <select name="nationalitie_id" class="form-control" required>
                                  <option value="" selected disabled>Select Nationalitie</option>
                                  @foreach ($nationalities as $nationalitie)
                                      <option value="{{ $nationalitie->id }}" {{ $nurse->nationalitie_id == $nationalitie->id ? 'selected' : '' }}>{{ $nationalitie->name }}</option>
                                  @endforeach
                               </select>
                               <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                               <label>Bloods</label>
                               <select name="blood_id" class="form-control" required>
                                 <option value="" selected disabled>Select Blood</option>
                                 @foreach ($bloods as $blood)
                                    <option value="{{ $blood->id }}" {{ $nurse->blood_id == $blood->id ? 'selected' : '' }}>{{ $blood->name }}</option>
                                 @endforeach
                               </select>
                               <span class="help-block with-errors"></span>
                            </div>
                        </div>
                      </div>

                      <div class="form-group">
                          @if ($nurse->status === 1)
                              <label>Status</label><br>
                              <input type="checkbox" class="minimal" name="status" checked>
                          @else
                              <label>Status</label><br>
                              <input type="checkbox" class="minimal" name="status">
                          @endif
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                              <label>Note</label>
                              <textarea name="note" class="form-control" placeholder="Enter ...">{{ $nurse->note }}</textarea>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                          <img src="{{ URL::asset('attachments/nurses_images/'.$nurse->nurses_images) }}" type="image/*"  height="100px" width="100px"><br><br>
                          <label>Images <span class="text-danger">*</span></label>
                          <input type="file" accept="image/*" name="nurses_images">
                        </div>
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

              <!-- Show -->
               <div class="modal fade" id="show{{ $nurse->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Nurse Show</h4>
                    </div>
                   <div class="modal-body">

                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                           <input type="hidden" name="id" id="id" value="{{ $nurse->id }}">
                           <label>Name Arabic</label>
                           <input type="text" name="name" value="{{ $nurse->getTranslation('name', 'ar') }}" class="form-control" readonly>
                         </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                             <label>Name English</label>
                             <input type="text" name="name_en" value="{{ $nurse->getTranslation('name', 'en') }}" class="form-control" readonly>
                           </div>
                       </div>
                     </div>

                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                           <label>Email</label>
                           <input type="email" name="email" value="{{ $nurse->email }}" class="form-control" readonly>
                         </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                             <label>Phone</label>
                             <input type="text" name="phone" value="{{ $nurse->phone }}" class="form-control" readonly>
                           </div>
                       </div>
                     </div>

                     <div class="row">
                       <div class="col-md-12">
                         <div class="form-group">
                           <label>Address</label>
                           <input type="text" name="address" value="{{ $nurse->address }}" class="form-control" readonly>
                         </div>
                       </div>
                     </div>

                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                           <label>Date Of Birth</label>
                           <input type="date" name="date_birth" value="{{ $nurse->date_birth }}" class="form-control" readonly>
                         </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                             <label>Joining Date</label>
                             <input type="date" name="joining_date" value="{{ $nurse->joining_date }}" class="form-control" readonly>
                           </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                              <label>Nationalities</label>
                              <option value="" selected disabled>{{ $nurse->nationalitie->name }}</option>
                              <span class="help-block with-errors"></span>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                              <label>Bloods</label>
                              <option value="" selected disabled>{{ $nurse->blood->name }}</option>
                              <span class="help-block with-errors"></span>
                           </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-6">
                          <div class="form-group">
                             <label>Status : </label>
                             @if ($nurse->status === 1)
                               <input placeholder="Active" class="form-control" readonly>
                             @else
                               <input placeholder="Not Active" class="form-control" readonly>
                             @endif
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-group">
                            <label>Note</label>
                             <input value="{{ $nurse->note }}" class="form-control" readonly>
                             <span class="help-block with-errors"></span>
                          </div>
                       </div>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Image</label><br>
                              <img src="{{ URL::asset('attachments/nurses_images/'.$nurse->nurses_images) }}" height="100px" width="100px">
                           </div>
                        </div>
                      </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                     </div>
                    </form>
                   </div>
                  </div>
                </div>
               </div>
              <!-- Show End -->

              <!-- Delete -->
                <div class="modal fade" id="delete{{ $nurse->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Delete Nurse</h4>
                        </div>
                       <div class="modal-body">
                        <form action="{{ route('nurses.destroy', 'test') }}" method="POST">
                            {{ method_field('Delete') }}
                            @csrf
                            <div class="modal-body">
                                <p>Are sure of the deleting process ?</p><br>
                                <input id="id" type="hidden" name="id" class="form-control" value="{{ $nurse->id }}">
                                <input type="hidden" name="nurses_images" value="{{ $nurse->nurses_images }}">
                                <input class="form-control" name="name" value="{{ $nurse->name }}" type="text" readonly>
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
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date Of Birth</th>
                <th>Joining Date</th>
                <th>Nationalitie</th>
                <th>Blood</th>
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

<!-- Add Nurse -->
  <div class="modal fade" id="AddNurse">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
              <h4 class="modal-title">Add Nurse</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('nurses.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Name Arabic</label>
                      <input type="text" name="name"  class="form-control" required>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                      <label>Name English</label>
                      <input type="text" name="name_en" class="form-control" required>
                      <span class="help-block with-errors"></span>
                   </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" required>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                      <label>Phone</label>
                      <input type="text" name="phone" class="form-control" required>
                      <span class="help-block with-errors"></span>
                   </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control" required>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Date Of Birth</label>
                      <input type="date" name="date_birth" class="form-control" required>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                      <label>Joining Date</label>
                      <input type="date" name="joining_date" value="{{ date('Y-m-d') }}" class="form-control" required>
                      <span class="help-block with-errors"></span>
                   </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                       <label>Nationalities</label>
                       <select name="nationalitie_id" class="form-control" required>
                          <option value="" selected disabled>Select Nationalitie</option>
                          @foreach ($nationalities as $nationalitie)
                              <option value="{{ $nationalitie->id }}"> {{ $nationalitie->name }}</option>
                          @endforeach
                       </select>
                       <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                       <label>Bloods</label>
                       <select name="blood_id" class="form-control" required>
                          <option value="" selected disabled>Select Blood</option>
                          @foreach ($bloods as $blood)
                              <option value="{{ $blood->id }}"> {{ $blood->name }}</option>
                          @endforeach
                       </select>
                       <span class="help-block with-errors"></span>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Note</label>
                      <textarea name="note" class="form-control" placeholder="Enter ..."></textarea>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label>Images <span class="text-danger">*</span></label>
                  <input type="file" accept="image/*" name="nurses_images" required>
                </div>
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
<!-- End Add Nurse -->

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
