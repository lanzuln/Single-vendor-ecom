@extends('backend.layout.master')
@section('page-title')
    Caetegory list
@endsection

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
    <style>
        .dataTables_length {
            padding: 20px 0px;
        }
    </style>
@endpush

@section('body')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-6">
                    <h1>Category list</h1>
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('category.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add
                            New Category</a>
                    </div>
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Customers List Start -->
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">SL no</th>
                                    <th scope="col">Last modified</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">slug</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $item)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <td>{{ $item->updated_at->format('d M Y') }}</td>
                                        <td><img src="{{asset($item->category_image)}}" alt="" width="100"></td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>
                                            <button class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> <a
                                                    href="{{ route('category.edit', $item->slug) }}"
                                                    class="text-white">Edit</a></button>
                                            <form action="{{ route('category.destroy', $item->slug) }}" method="post"
                                                id="deleteForm" >
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" id="delete"><i
                                                        class="fa-solid fa-trash"></i> <a href=""
                                                        class="text-white">Delete</a></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Customers List End -->
    </div>

    @push('script')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    pagingType: 'first_last_numbers'
                });

                $('#delete').click(function(event) {
                    let form = $('#deleteForm');
                    event.preventDefault();
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
