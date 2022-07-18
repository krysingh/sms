@extends('admin.admin_master');
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12 col-lg-12 col-xl-12">

                    <!-- /.box -->
                    <div class="box box-widget widget-user">

                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black"
                            style="background: url('{{asset('upload/no_image.jpg')}} center center;">
                            <a href="{{route('user.profile.edit')}}" style="float:right;" class="btn btn-primary">Edit
                                Profile</a>
                            <h3 class="widget-user-username">{{$userProfile->name}}</h3>
                            <h6 class="widget-user-desc">{{$userProfile->usertype}}</h6>
                            <h6 class="widget-user-desc">{{$userProfile->email}}</h6>

                        </div>

                        <div class="widget-user-image">
                            <img class="rounded-circle"
                                src="{{(!empty($userProfile->image)) ? url('upload/user_profile/'.$userProfile->image) : url('upload/no_image.jpg')}}"
                                alt="User Avatar">

                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Mobile</h5>
                                        <span class="description-text">{{$userProfile->mobile}}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 br-1 bl-1">
                                    <div class="description-block">
                                        <h5 class="description-header">Address</h5>
                                        <span class="description-text">{{$userProfile->address}}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Gender</h5>
                                        <span class="description-text">{{$userProfile->gender}}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->

        </section>
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
</div>
@endsection