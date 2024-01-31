

<div class="card-body">
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{$user->name ?? ''}}">
    </div>
    <div class="form-group">
        <label for="name">Email </label>
        <input type="text" name="email" class="form-control" id="name" placeholder="Enter Email" value="{{$user->email ?? ''}}">
        </div>
    <div class="form-group">
        <label for="name">Password</label>
        <input type="text" name="password" class="form-control" id="name" placeholder="Enter quantity" value="{{$user->password ?? ''}}">
    </div>

    <div class="form-group">
        <label for="exampleSelect">Select Type User:</label>
        <select class="form-control" name="type" >
            <option value="user"> user </option>
            <option value="admin"> admin </option>
            <option value="admin super"> admin super </option>
        </select>
    </div>

    <div class="card-footer">
    <button type="submit" class="btn btn-primary" >Submit</button>
    </div>
</div>

@push('script-form')
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>
<script>
$(function () {
bsCustomFileInput.init();
});
</script>
@endpush




