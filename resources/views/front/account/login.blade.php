@extends('front.layouts.app')

@section('main')
    <section class="section-5">
        <div class="container my-5">
            <div class="py-lg-2">&nbsp;</div>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p class="mb-0 pb-0"> {{ Session::get('success') }}</p>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    <p class="mb-0 pb-0"> {{ Session::get('error') }}</p>
                </div>
            @endif
            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow border-0 p-5">
                        <h1 class="h3">Login</h1>
                        <form action="{{ route('account.authenticate') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="mb-2">Email*</label>
                                <input type="text" value="{{ old('email') }}" name="email" id="email"
                                    class="form-control @error('email') is-invalid
                                     @enderror"
                                    placeholder="example@example.com">

                                @error('email')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror

                                <div class="mb-3">
                                    <label for="" class="mb-2">Password*</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control  @error('password') is-invalid
                                    @enderror"
                                        placeholder="Enter Password">
                                    @error('password')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="justify-content-between d-flex">
                                    <button class="btn btn-primary mt-2">Login</button>
                                    <a href="{{ route('account.forgotPassword') }}" class="mt-3">Forgot Password?</a>
                                </div>
                        </form>
                        <div class="text-center small pt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-google" viewBox="0 0 16 16">
                                <path
                                    d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z" />
                            </svg>
                            <a href="{{ route('account.loginGoogle') }}" style="padding-right: 30px;">Login To
                                Google</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                            </svg>
                            <a href="#">Login To
                                Facebook</a>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <p>Do not have an account? <a href="{{ route('account.registration') }}">Register</a></p>
                    </div>
                </div>
            </div>
            <div class="py-lg-5">&nbsp;</div>
        </div>
    </section>
@endsection
