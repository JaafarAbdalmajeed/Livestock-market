@extends('layouts.user')

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2></h2>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Account settings</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Breadcrumbs -->

    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" name="image" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="user_name" class="form-control mb-1" value="nmaxwell">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Loacl</label>
                                    <select name="local" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            <button type="button" class="btn btn-primary save-changes">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('save-changes').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.$.ajax({
                    type: "POST",
                    url: "{{route('profile.settings.update')}}",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Changes saved successfully!'
                    }).then((result) => {
                        // You can perform additional actions after the alert is dismissed
                        // For example, redirect to another page
                        window.location.href = '/';
                    });

                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.user')

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2></h2>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Account settings</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Breadcrumbs -->

    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" name="image" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="user_name" class="form-control mb-1" value="nmaxwell">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Loacl</label>
                                    <select name="local" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            <button type="button" class="btn btn-primary save-changes">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('save-changes').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.$.ajax({
                    type: "POST",
                    url: "{{route('profile.settings.update')}}",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Changes saved successfully!'
                    }).then((result) => {
                        // You can perform additional actions after the alert is dismissed
                        // For example, redirect to another page
                        window.location.href = '/';
                    });

                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.user')

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2></h2>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Account settings</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Breadcrumbs -->

    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" name="image" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="user_name" class="form-control mb-1" value="nmaxwell">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Loacl</label>
                                    <select name="local" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            <button type="button" class="btn btn-primary save-changes">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('save-changes').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.$.ajax({
                    type: "POST",
                    url: "{{route('profile.settings.update')}}",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Changes saved successfully!'
                    }).then((result) => {
                        // You can perform additional actions after the alert is dismissed
                        // For example, redirect to another page
                        window.location.href = '/';
                    });

                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.user')

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2></h2>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Account settings</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Breadcrumbs -->

    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" name="image" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="user_name" class="form-control mb-1" value="nmaxwell">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Loacl</label>
                                    <select name="local" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            <button type="button" class="btn btn-primary save-changes">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('save-changes').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.$.ajax({
                    type: "POST",
                    url: "{{route('profile.settings.update')}}",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Changes saved successfully!'
                    }).then((result) => {
                        // You can perform additional actions after the alert is dismissed
                        // For example, redirect to another page
                        window.location.href = '/';
                    });

                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.user')

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2></h2>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Account settings</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Breadcrumbs -->

    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" name="image" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="user_name" class="form-control mb-1" value="nmaxwell">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Loacl</label>
                                    <select name="local" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            <button type="button" class="btn btn-primary save-changes">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('save-changes').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.$.ajax({
                    type: "POST",
                    url: "{{route('profile.settings.update')}}",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Changes saved successfully!'
                    }).then((result) => {
                        // You can perform additional actions after the alert is dismissed
                        // For example, redirect to another page
                        window.location.href = '/';
                    });

                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.user')

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2></h2>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Account settings</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Breadcrumbs -->

    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" name="image" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="user_name" class="form-control mb-1" value="nmaxwell">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Loacl</label>
                                    <select name="local" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            <button type="button" class="btn btn-primary save-changes">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('save-changes').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.$.ajax({
                    type: "POST",
                    url: "{{route('profile.settings.update')}}",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Changes saved successfully!'
                    }).then((result) => {
                        // You can perform additional actions after the alert is dismissed
                        // For example, redirect to another page
                        window.location.href = '/';
                    });

                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.user')

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2></h2>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Account settings</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Breadcrumbs -->

    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" name="image" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="user_name" class="form-control mb-1" value="nmaxwell">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Loacl</label>
                                    <select name="local" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            <button type="button" class="btn btn-primary save-changes">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('save-changes').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.$.ajax({
                    type: "POST",
                    url: "{{route('profile.settings.update')}}",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Changes saved successfully!'
                    }).then((result) => {
                        // You can perform additional actions after the alert is dismissed
                        // For example, redirect to another page
                        window.location.href = '/';
                    });

                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.user')

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2></h2>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Account settings</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Breadcrumbs -->

    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" name="image" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="user_name" class="form-control mb-1" value="nmaxwell">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Loacl</label>
                                    <select name="local" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            <button type="button" class="btn btn-primary save-changes">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('save-changes').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.$.ajax({
                    type: "POST",
                    url: "{{route('profile.settings.update')}}",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Changes saved successfully!'
                    }).then((result) => {
                        // You can perform additional actions after the alert is dismissed
                        // For example, redirect to another page
                        window.location.href = '/';
                    });

                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.user')

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2></h2>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Account settings</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Breadcrumbs -->

    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" name="image" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="user_name" class="form-control mb-1" value="nmaxwell">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Loacl</label>
                                    <select name="local" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            <button type="button" class="btn btn-primary save-changes">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('save-changes').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.$.ajax({
                    type: "POST",
                    url: "{{route('profile.settings.update')}}",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Changes saved successfully!'
                    }).then((result) => {
                        // You can perform additional actions after the alert is dismissed
                        // For example, redirect to another page
                        window.location.href = '/';
                    });

                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.user')

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2></h2>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Account settings</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Breadcrumbs -->

    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" name="image" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="user_name" class="form-control mb-1" value="nmaxwell">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Loacl</label>
                                    <select name="local" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            <button type="button" class="btn btn-primary save-changes">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('save-changes').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.$.ajax({
                    type: "POST",
                    url: "{{route('profile.settings.update')}}",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Changes saved successfully!'
                    }).then((result) => {
                        // You can perform additional actions after the alert is dismissed
                        // For example, redirect to another page
                        window.location.href = '/';
                    });

                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.user')

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2></h2>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Account settings</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Breadcrumbs -->

    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" name="image" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="user_name" class="form-control mb-1" value="nmaxwell">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Loacl</label>
                                    <select name="local" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            <button type="button" class="btn btn-primary save-changes">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('save-changes').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.$.ajax({
                    type: "POST",
                    url: "{{route('profile.settings.update')}}",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Changes saved successfully!'
                    }).then((result) => {
                        // You can perform additional actions after the alert is dismissed
                        // For example, redirect to another page
                        window.location.href = '/';
                    });

                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.user')

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2></h2>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Account settings</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Breadcrumbs -->

    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" name="image" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="user_name" class="form-control mb-1" value="nmaxwell">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Loacl</label>
                                    <select name="local" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            <button type="button" class="btn btn-primary save-changes">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('save-changes').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.$.ajax({
                    type: "POST",
                    url: "{{route('profile.settings.update')}}",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Changes saved successfully!'
                    }).then((result) => {
                        // You can perform additional actions after the alert is dismissed
                        // For example, redirect to another page
                        window.location.href = '/';
                    });

                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.user')

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2></h2>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Account settings</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Breadcrumbs -->

    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- <div class="card-body media align-items-center">
                                <img src="" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" name="image" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> --}}
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="user_name" class="form-control mb-1" value="nmaxwell">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="nmaxwell@mail.com">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Loacl</label>
                                    <select name="local" class="custom-select">
                                        <option value="">a</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3 mb-5">
            <button type="button" class="btn btn-primary save-changes">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>

@endsection
