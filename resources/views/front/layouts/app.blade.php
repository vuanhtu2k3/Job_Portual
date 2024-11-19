<!DOCTYPE html>
<html class="no-js" lang="en_AU" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>CareerVibe | Find Best Jobs</title>
    <meta name="description" content="" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css"
        integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="#" />
</head>

<body data-instant-intensity="mousedown">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
            <div class="container">
                <a class="navbar-brand" href="index.html">CareerVibe</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                                href="{{ route('front.home') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('front.index') }}">Find Jobs</a>
                        </li>
                    </ul>

                    @if (!Auth::check())
                        <a class="btn btn-outline-primary me-2" href="{{ route('account.login') }}"
                            type="submit">{{ __('Login') }}</a>
                    @else
                        @if (Auth::user()->role == 'admin')
                            <a class="btn btn-outline-primary me-2" href="{{ route('admin.dashboard') }}"
                                type="submit">Admin</a>
                        @endif

                        <a class="btn btn-outline-primary me-2" href="{{ route('account.profile') }}"
                            type="submit">{{ __('Account') }}</a>
                        <li class="dropdown">
                            <a href="#" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Create CV
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a href="{{ route('account.createCV') }}" class="dropdown-item">Create CV</a>
                                </li>
                                <li>
                                    <a href="{{ route('account.viewCV') }}" class="dropdown-item">Xem CV</a>
                                </li>
                            </ul>
                        </li>
                        <style>
                            .dropdown {
                                list-style-type: none;
                                margin: 0;
                                padding: 0;
                            }
                        </style>

                    @endif

                    <a class="btn btn-primary m-4" href="{{ route('account.createJob') }}" type="submit">Post a
                        Job</a>


                    <div class="language-switcher">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                @if (app()->getLocale() == 'en')
                                                    <span class="text-uppercase btn btn-primary"
                                                        id="selected-language">English</span>
                                                @else
                                                    <span class="text-uppercase btn btn-primary"
                                                        id="selected-language">Tiếng
                                                        Việt</span>
                                                @endif
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('front.language', ['en']) }}">
                                                        English
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('front.language', ['vi']) }}">
                                                        Tiếng Việt
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    @yield('main')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="profilePicForm" name="profilePicForm" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <p></p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mx-3">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark py-3 bg-2">
        <div class="container  pt-3">
            <style>
                .footer-card {
                    color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    /* Subtle shadow for depth */
                    margin-bottom: 20px;
                    /* Spacing between rows/columns */
                    text-align: left;
                }

                .footer-card h3 {
                    color: yellow;
                    text-transform: uppercase;
                    /* Dark gray text */
                    font-size: 18px;
                    font-weight: bold;
                    margin-bottom: 15px;
                    /* Spacing under headings */
                }

                .footer-card ul {
                    list-style-type: none;
                    /* Remove default list styling */
                    padding: 0;
                    margin: 0;
                }

                .footer-card ul li {
                    margin-bottom: 10px;
                    /* Spacing between links */
                }

                .footer-card ul li a {
                    text-decoration: none;
                    /* Remove underline */
                    color: #fff;
                    /* Bootstrap primary color */
                    font-size: 14px;
                    transition: color 0.3s ease;
                    /* Smooth hover transition */
                }

                .footer-card ul li a:hover {
                    color: #0056b3;
                    /* Darker blue on hover */
                    text-decoration: underline;
                    /* Add underline on hover */
                }

                .footer-card p {
                    color: #6c757d;
                    /* Muted gray text */
                    font-size: 14px;
                    line-height: 1.5;
                }
            </style>
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-card">
                        <h3>{{ __('Contact US') }}</h3>

                        {{ __('Phu Dien, Bac Tu Liem, Hanoi') }} <br>
                        tuvux14@example.com <br>
                        0369944555</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card">
                        <h3>{{ __('Important Links') }}</h3>
                        <ul>
                            <li><a href="#">{{ __('Home') }}</a></li>
                            <li><a href="#">{{ __('About Us') }}</a></li>
                            <li><a href="#">{{ __('Contact Us') }}</a></li>
                            <li><a href="#">{{ __('Privacy Policy') }}</a></li>
                            <li><a href="#">{{ __('Terms of Service') }}</a></li>
                        </ul>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="footer-card">
                        <h3>{{ __('Services and other information') }}</h3>
                        <ul>
                            <li><a href="#">{{ __('Introduce') }}</a></li>
                            <li><a href="#">{{ __('CONTACT-US') }}</a></li>
                            <li><a href="#">{{ __('Privacy Policy') }}</a></li>
                            <li><a href="#">{{ __('Terms of Use') }}</a></li>
                            <li><a href="#">{{ __('Frequently Asked Questions') }}</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </footer>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"
        integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        $('.textarea').trumbowyg();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#profilePicForm").submit(function(event) {
            event.preventDefault();

            var formData = new FormData(this);


            $.ajax({
                url: '{{ route('account.updateProfilePic') }}',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {

                    if (response.status == true) {

                        window.location.href = '{{ route('account.profile') }}';
                    } else {
                        var errors = response.errors;
                        if (errors.image) {
                            $("#image").addClass('is-invalid').siblings('p')
                                .addClass('invalid-feedback').html(errors.image);
                        } else {
                            $("#image").removeClass('is-invalid').siblings('p')
                                .removeClass('invalid-feedback').html('');
                        }
                    }
                }
            });
        })
    </script>
    @yield('customJs')
</body>

</html>
