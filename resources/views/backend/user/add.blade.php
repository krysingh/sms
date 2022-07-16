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
                            <h4 class="box-title">Text inputs</h4>
                        </div>
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-float">
                                            <label class="form-group-float-label">Role</label>
                                            <select class="form-control" name="usertype" id="usertype">
                                                <option value="">
                                                    Select Role
                                                </option>
                                                <option value="Admin">
                                                    Admin
                                                </option>
                                                <option value="User">
                                                    User
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Name" name="name"
                                                id="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" placeholder="Password input"
                                                name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password input"
                                                id="password" name="password">
                                        </div>
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