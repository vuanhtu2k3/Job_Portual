<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index()
    {
        // Thống kê tổng số công việc
        $jobCount = Job::count();

        // Thống kê tổng số người dùng
        $userCount = User::count();


        // Truyền các dữ liệu thống kê đến view
        return view('admin.dashboard', [
            'jobCount' => $jobCount,
            'userCount' => $userCount,
        ]);
    }
}
