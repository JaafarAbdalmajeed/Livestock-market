@extends('layouts.user')

@section('title', 'Profile')
@section('content')
@include('user.Breadcrumbs', ['pageTitle' => 'profile'])



    <div class="container-fluid">
        <div class=" mb-5 row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ '/uploads/users/' . Auth::user()->image }}" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center admin_name">{{Auth::user()->name}}</h3>
                    <p class="text-muted text-center">Software Engineer</p>
                    <form action="{{ route('profile.user.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input name="image" class="btn" id="formFileLg" type="file">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Change picture</button>
                    </form>
                </div >
                </div>
            </div>
        <div class="col-md-9">
            <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#personal_information" data-toggle="tab">Personal Information</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab">Change Password </a></li> --}}
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                <div class="active tab-pane" id="personal_information">
                    <form class="form-horizontal" method="POST" action="{{ route('userUpdateInfo')}}" id="UserInfoForm">
                        @csrf
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label mt-2">Name</label>
                        <div class="col-sm-10 mt-2">
                        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" id="inputName" placeholder="Name">
                        <span class="text-danger error-text name-error"></span>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="inputEmail" class="col-sm-2 col-form-label mt-2">Email</label>
                        <div class="col-sm-10 mt-2">
                        <input type="email" class="form-control" name="email" id="inputEmail" value="{{Auth::user()->email}}" placeholder="Email">
                        <span class="text-danger error-text email-error"></span>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="inputName2" class="col-sm-2 col-form-label mt-2">Phone</label>
                        <div class="col-sm-10 mt-2">
                        <input type="text" name="phone" class="form-control" id="inputName2" placeholder="PHone">
                        <span class="text-danger error-text phone-error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger mt-2">Save Change</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="tab-pane" id="change_password">
                    <form class="form-horizontal">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Enter current password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputName2" id="newpassword" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Enter new password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputName2" id="newpassword" class="col-sm-2 col-form-label">Confirm New Password</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="ReEnter new password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Update password</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>

    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#UserInfoForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                beforeSend: function(){
                    $(document).find('span.error-text').text('');
                },
                success: function(data){
                    if(data.code == 0){
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $('.admin_name').html($('#UserInfoForm').find($('input[name="name"]')).val());
                        alert(data.message); // Change 'msg' to 'message'
                    }
                }
            });
        });


    });

</script>
@endsection
