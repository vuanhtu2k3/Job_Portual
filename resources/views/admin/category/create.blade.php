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
                                    <a href="{{ route('admin.categories') }}"> <button
                                            class="btn btn-primary">Back</button></a>
                                </div>
                            </div>
                            <form action="" id="createCategoryForm" name="createCategoryForm" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">
                                        <h6>Name:</h6>
                                    </label>
                                    <div class="col-md-6">
                                        <input id="name" name="name" type="text" class="form-control" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="status" class="col-md-4 col-form-label text-md-end">
                                        <h6>Status:</h6>
                                    </label>
                                    <div class="col-md-6">
                                        <input id="status" name="status" type="text" class="form-control" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </div>
                            </form>


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
        $("#createCategoryForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('admin.categories.store') }}", // Use the correct POST route here
                type: "POST",
                data: $("#createCategoryForm").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        window.location.href = "{{ route('admin.categories') }}";
                    }
                }
            });

        })
    </script>
@endsection
