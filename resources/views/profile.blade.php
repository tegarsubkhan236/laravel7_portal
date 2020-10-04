@extends('layout.admin-base.main')

@section('title', 'Profile Pages' )

@section('breadcrumb')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Administrator</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$data["nama"]}}</h3>

                        <p class="text-muted text-center">
                            @if ($data["level"] == 1)
                            Administrator
                            @elseif($data["level"]  == 2)
                            Author
                            @elseif($data["level"]  == 0)
                            Netizen
                            @endif
                        </p>
                    </div>
                </div>
                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Nama Lengkap</strong>
                    <p class="text-muted">
                        {{$data["nama"]}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                    <p class="text-muted">{{$data["alamat"]}}</p>
                    <hr>
                    <strong><i class="fa fa-map-marker-alt mr-1"></i> Email</strong>
                    <p class="text-muted">{{$data["email"]}}</p>
                    <hr>

                    <strong><i class="fa fa-map-marker-alt mr-1"></i> No HP</strong>
                    <p class="text-muted">{{$data["no_hp"]}}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                    <div class="tab-content">
                        <!-- ACTIVITY -->
                        <div class="active tab-pane" id="activity">
                        </div>
                        <!-- TIMELINE -->
                        <div class="tab-pane" id="timeline">
                        </div>
                        <!-- SETTING -->
                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                                </div>
                                <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@stop

