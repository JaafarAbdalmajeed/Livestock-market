


    <div class="card-body">
        <div class="form-group">
        <label for="name">Name Factory</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{$factory->name ?? ''}}">
        </div>

        <div class="form-group">
            <label for="exampleSelect">Select an option:</label>
            <select class="form-control" name="category_id" >
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->name }} </option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$factory->description ?? ''}}</textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Factory image</label>
            <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="exampleInputFile" accept="image/*">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Upload</span>
            </div>
            </div>
            <img src="{{ asset('uploads/factories/'. $factory->image)}}" width="50px" height="50px" alt="">

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




