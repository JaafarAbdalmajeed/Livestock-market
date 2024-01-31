

<div class="card-body">
    <div class="form-group">
    <label for="name">Name Product</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{$product->name ?? ''}}">
    </div>
    <div class="form-group">
        <label for="name">Price Product</label>
        <input type="text" name="price" class="form-control" id="name" placeholder="Enter Price" value="{{$product->price ?? ''}}">
        </div>
    <div class="form-group">
        <label for="name">quantity Product</label>
        <input type="text" name="quantity" class="form-control" id="name" placeholder="Enter quantity" value="{{$product->quantity ?? ''}}">
        </div>

    <div class="form-group">
        <label for="name">unit Product</label>
        <input type="text" name="unit" class="form-control" id="name" placeholder="Enter unit" value="{{$product->unit ?? ''}}">
        </div>

    <div class="form-group">
        <label for="exampleSelect">Select Category:</label>
        <select class="form-control" name="category_id" >
            @foreach ($categories as $category)
            <option value="{{ $category->id }}"> {{ $category->name }} </option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="exampleSelect">Select Factory:</label>
        <select class="form-control" name="factory_id" >
            @foreach ($factories as $factory)
            <option value="{{ $factory->id }}"> {{ $factory->name }} </option>
        @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="exampleInputFile">Product image</label>
        <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" id="exampleInputFile" accept="image/*">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text">Upload</span>
        </div>
        </div>
        @if ($product->image)
        <img src="{{ asset('uploads/products/'. $product->image)}}" width="50px" height="50px" alt="">
        @endif


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




