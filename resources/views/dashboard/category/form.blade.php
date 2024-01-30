


                    <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name Category</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{$category->name ?? ''}}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$category->description ?? ''}}</textarea>
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
