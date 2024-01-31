


<div class="card-body">
    <div class="form-group">
    <label for="name">Title </label>
    <input type="text" name="title" class="form-control" id="name" placeholder="Enter name" value="{{$description->title ?? ''}}">
    </div>

    <div class="form-group">
        <label for="description">Text</label>
        <textarea class="form-control" name="text" id="description" cols="30" rows="10">{{$description->text ?? ''}}</textarea>
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




