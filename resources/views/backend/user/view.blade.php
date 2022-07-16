@extends('admin.admin_master');
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <span>
                                <h3 class="box-title">User Data </h3><a href="{{route('user.add')}}" style="float:right"
                                    class="btn btn-rounded btn-success">Add
                                    User</a>
                            </span>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$data->usertype}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td><a href="{{route('user.edit',$data->id)}}" class="text-primary"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{route('user.delete',$data->id)}}" class="text-danger"><i
                                                        class="fa fa-trash" id="delete"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
</div>
@endsection