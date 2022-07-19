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
                            <h4 class="box-title">Change Password</h4>
                        </div>
                        <form action="{{route('password.upadte')}}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input type="password" class="form-control" placeholder="Current Password"
                                                id="oldpassword" name="oldpassword">
                                        </div>
                                        @error('oldpassword')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" placeholder="New Password"
                                                name="password" id="password">
                                        </div>
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="Confirm Password"
                                                name="password_confirmation" id="password_confirmation">
                                        </div>
                                        @error('password_confirmation')
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