@extends('admin.layouts.master')
@section('css')
<link rel="stylesheet" href="{{ asset('admindashboard/plugins/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('admincontent')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">

            <div class="col-sm-12">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Employee</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                  @include('massage.flashmassage')
                <h3 class="card-title">Employee List</h3>
                <a href="{{ route('admin.employeeinfo.create') }}" class="pull-right btn btn-success">+</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow: auto">
                <table id="example" class="table table-bordered table-striped table-sm table-inverse">
                  <thead>
                  <tr>
                    <th>Employee Name</th>
                    <th>Employee Email</th>
                    <th>Employee Mobile No</th>
                    <th>Gender</th>
                    <th>Education Qualification</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($items as $item)
                  <tr>
                    <td>{{ $item->employee_name ?? '' }}</td>
                    <td>{{ $item->employee_email  ?? '' }}</td>
                    <td>{{ $item->employee_mobile_no ?? '' }}</td>
                    <td>
                    	@if($item->gender = 1)
                    	Male
                    	@elseif($item->gender = 2)
                    	female
                    	@else
                    	Other
                    	@endif
                    </td>
                    <td>
                    	@foreach($item->education as $education)
                    	{{$education->educational_qualification ?? ''}}
                    	@endforeach
                    </td>

                    <td>
                        <a href="{{ route('admin.employeeinfo.edit',$item->id) }}" ><i class="fa fa-edit btn btn-primary"></i></a>
                        <a  data-toggle="modal" data-target="#myModal{{ $item->id }}"><i class="fa fa-trash btn btn-danger" aria-hidden="true"></i>
                        </a>
                        <!---Modal start----->
                        <div class="modal" id="myModal{{ $item->id }}">
                            <div class="modal-dialog">
                              <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title">Delete item</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="{{ route('admin.employeeinfo.destroy',$item->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                <!-- Modal body -->
                                <div class="modal-body">
                                    Are you sure to delete ?
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-success" >Yes</button>
                                </div>
                                </form>

                              </div>
                            </div>
                          </div>

                        </div>
                              <!---Modal end----->
                    </td>
                  </tr>
                  @endforeach
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('admindashboard/plugins/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admindashboard/plugins/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>
@endsection
