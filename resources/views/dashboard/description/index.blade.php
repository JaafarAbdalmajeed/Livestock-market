@extends('layouts.dashboard')


@push('stylesheet-table')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('title','descriptions')
@section('content')


    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                @if ($nameTable == 'factories')
                <h3 class="card-title mr-3"><a class="btn btn-primary" href="{{route('descriptions.createFactory' , ['id' => $factory_id])}}">Create</a></h3>
                @else
                <h3 class="card-title mr-3"><a class="btn btn-primary" href="{{ route('descriptions.createProduct' , ['id' => $product_id])}}">Create</a></h3>
                @endif


              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Text</th>
                        @if (count($descriptions) > 0)
                            @if ($descriptions[0]->factory)
                                <th>Factory</th>
                            @endif
                            @if ($descriptions[0]->product)
                                <th>Product</th>
                            @endif
                        @endif
                        <th>Updated at</th>
                        <th>Created at</th>
                        <th>Deleted at</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($descriptions)
                        @foreach ($descriptions as $description)
                            <tr>
                                <td>{{$description->id}}</td>
                                <td>{{$description->title}}</td>
                                <td>{{$description->text}}</td>

                                @if ($description->factory)
                                <td>{{$description->factory->name}}</td>
                                @endif


                                @if ($description->product)
                                <td>{{$description->product->name}}</td>
                                @endif


                                <td>{{$description->created_at}}</td>
                                <td>{{$description->updated_at}}</td>
                                <td>{{$description->deleted_at}}</td>

                                @if ($description->factory)
                                <td><a class="btn btn-primary" href="{{ route('descriptions.editFactory', ['description_id' => $description->id , 'factory_id' => $description->factory->id]) }}">Edit</a></td>

                                @endif

                                @if ($description->product)
                                <td><a class="btn btn-primary" href="{{ route('descriptions.editProduct', ['id' => $description->id]) }}">Edit</a></td>

                                @endif
                                {{-- <td>
                                    <form action="{{ route('description.destroy', ['description' => $description->id , 'nameTable'=>'fcatories']) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>No descriptions</td>
                        </tr>
                    @endif

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


@endsection

@push('script-table')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>

@endpush


