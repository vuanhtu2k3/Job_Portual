@extends('front.layouts.app')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('admin.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('front.message')
                    <div class="card border-0 shadow mb-4">

                        <div class="card-body card-form">
                            <div class="d-flex justify-content-between">

                                <div>
                                    <h3 class="fs-4 mb-1">Categorys</h3>
                                </div>
                                <div>
                                    <a href="{{ route('admin.categories.create') }}"> <button class="btn btn-primary">New
                                            Category</button></a>
                                </div>


                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Status </th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">
                                        @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td> {{ $category->id }}</td>
                                                    <td>
                                                        {{ $category->name }}
                                                    </td>
                                                    <td>
                                                        @if ($category->status == 1)
                                                            <span class="text-success">Active</span>
                                                        @else
                                                            <span class="text-danger">Block</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="action-dots ">
                                                            <button href="#" class="btn" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">

                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('admin.categories.edit', $category->id) }}"><i
                                                                            class="fa fa-edit" aria-hidden="true"></i>
                                                                        Edit</a></li>
                                                                <li><a class="dropdown-item" href="#"
                                                                        onclick="deleteCategory({{ $category->id }})"><i
                                                                            class="fa fa-trash" aria-hidden="true"></i>
                                                                        Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                            {{-- <div>
                                {{ $categories->links() }}
                            </div> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('customJs')
    <script type="text/javascript">
        function deleteJob(id) {
            if (confirm('Are you sure want to Category?')) {
                $.ajax({
                    url: '{{ route('admin.categories.delete', $category->id) }}',
                    type: 'delete',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == true) {
                            window.location.href = '{{ route('admin.categories') }}';
                        }
                    }

                });
            }
        }
    </script>
@endsection
