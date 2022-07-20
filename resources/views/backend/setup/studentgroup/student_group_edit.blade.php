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
                            <h4 class="box-title">Update Student Group</h4>
                        </div>
                        <form action="{{route('student.group.update',$editGroup->id)}}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Student Group</label>
                                            <input type="text" class="form-control" value="{{$editGroup->name}}"
                                                name="name" id="name">
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="submit" value="Submit" class="btn btn-rounded btn-primary"
                                                style="float:right">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box -->
            </div>
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
</div>
@endsection