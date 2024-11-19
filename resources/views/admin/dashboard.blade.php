@extends('front.layouts.app')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
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
                        <div class="container py-5">
                            <h2 class="text-center mb-4">Admin Dashboard</h2>

                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Tổng số công việc</h5>
                                    <canvas id="jobsChart"></canvas>
                                </div>
                                <div class="col-md-6">
                                    <h5>Tổng số người dùng</h5>
                                    <canvas id="usersChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Biểu đồ cho số lượng công việc
        var ctx1 = document.getElementById('jobsChart').getContext('2d');
        var jobsChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Công việc'], // Mô tả biểu đồ
                datasets: [{
                    label: 'Số lượng công việc',
                    data: [{{ $jobCount }}], // Dữ liệu từ controller
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Biểu đồ cho số lượng người dùng
        var ctx2 = document.getElementById('usersChart').getContext('2d');
        var usersChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Người dùng'],
                datasets: [{
                    label: 'Số lượng người dùng',
                    data: [{{ $userCount }}],
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
