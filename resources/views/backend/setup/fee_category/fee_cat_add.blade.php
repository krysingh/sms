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
                            <h4 class="box-title">Add Fee Category</h4>
                        </div>
                        <form action="{{route('fee.cat.store')}}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Fee Category Year</label>
                                            <input type="text" class="form-control" placeholder="Category Name"
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