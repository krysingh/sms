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
                            <h4 class="box-title">Edit User Profile</h4>
                        </div>
                        <form action="{{route('user.profile.store',$userProfileEdit->id)}}" method="post"
                            enctype='multipart/form-data'>
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="{{$userProfileEdit->name}}"
                                                name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" value="{{$userProfileEdit->email}}"
                                                name="email" id="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input type="text" class="form-control" value="{{$userProfileEdit->mobile}}"
                                                name="mobile" id="mobile">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control"
                                                value="{{$userProfileEdit->address}}" name="address" id="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-float">
                                            <label class="form-group-float-label">Gender</label>
                                            <select class="form-control" name="gender" id="gender">
                                                <option value="">
                                                    Select Role
                                                </option>
                                                <option value="Male"
                                                    {{ ( $userProfileEdit->gender == 'Male') ? 'selected' : '' }}>
                                                    Male
                                                </option>
                                                <option value="Female"
                                                    {{ ( $userProfileEdit->gender == 'Female') ? 'selected' : '' }}>
                                                    Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>
                                        <div class="form-group">
                                            <img src="{{(!empty($userProfileEdit->image)) ? url('upload/user_profile/'.$userProfileEdit->image) :url('upload/no_image.jpg')}}"
                                                id="showImg" style="width:100px;height:100px;">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="submit" value="Update" class="btn btn-rounded btn-primary"
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