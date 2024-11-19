@extends('front.layouts.app')

@section('main')
    <div class="container py-5">
        <h2 class="text-center mb-4"> CV của bạn</h2>

        @if ($resumes->isEmpty())
            <p class="text-center">Bạn chưa có CV nào.</p>
        @else
            <div class="row justify-content-center"> <!-- Căn giữa các card trong row -->
                @foreach ($resumes as $resume)
                    <div class="col-md-6 mb-4 d-flex justify-content-center"> <!-- Căn giữa mỗi card -->
                        <div class="card shadow" style="width: 100%; max-width: 500px;"> <!-- Giới hạn chiều rộng của card -->
                            <div class="card-body">
                                <h5 class="card-title text-center">Họ và Tên: {{ $resume->name }}</h5>
                                <!-- Căn giữa tiêu đề -->
                                <p><strong>Email:</strong> {{ $resume->email }}</p>
                                <p><strong>Số điện thoại:</strong> {{ $resume->phone }}</p>
                                <p><strong>Mô tả:</strong> {{ $resume->summary }}</p>
                                <p><strong>Kinh nghiệm:</strong> {{ $resume->experience }} năm</p>
                                <p><strong>Trình độ học vấn:</strong> {{ $resume->education }}</p>
                                <p><strong>Kỹ năng:</strong> {{ $resume->skills }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
<style>
    /* Add this CSS to your styles file or within a <style> tag in your blade view */

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        background: #fff;
        transition: all 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        padding: 30px;
        font-family: 'Arial', sans-serif;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
    }

    .card p {
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
        margin-bottom: 10px;
    }

    .card p strong {
        color: #000;
        font-weight: 600;
    }

    /* Styling for larger screens */
    @media (min-width: 768px) {
        .card-body {
            padding: 40px;
        }
    }

    /* Container Styles */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px;
    }

    /* Header Styling */
    h2 {
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        color: #333;
        font-size: 2rem;
        margin-bottom: 30px;
    }

    /* Centered Text */
    .text-center {
        text-align: center;
    }

    .text-center p {
        font-size: 1.2rem;
        color: #777;
    }

    .row {
        margin-top: 30px;
    }

    /* Card Width */
    .col-md-6 {
        max-width: 500px;
    }

    /* Optional: Adding some spacing between items */
    .mb-4 {
        margin-bottom: 25px !important;
    }
</style>
