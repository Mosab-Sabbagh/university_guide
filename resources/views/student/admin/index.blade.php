@extends('student.admin.layouts.app')
@section('title', ' الرئيسية')
@section('style')
        <style>
        .stats-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            font-family: 'Tajawal', sans-serif;
        }

        .stat-card {
            flex: 1;
            min-width: 250px;
            max-width: 320px;
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 15px;
        }

        .card-icon svg {
            width: 30px;
            height: 30px;
        }

        .card-content {
            flex: 1;
            text-align: right;
        }

        .card-title {
            color: #555;
            font-size: 18px;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .card-value {
            color: #333;
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }

        /* ألوان البطاقات */
        .student-card .card-icon {
            background-color: #e3f2fd;
            color: #1976d2;
        }

        .course-card .card-icon {
            background-color: #e8f5e9;
            color: #388e3c;
        }

        .summary-card .card-icon {
            background-color: #fff3e0;
            color: #ffa000;
        }

        @media (max-width: 768px) {
            .stats-container {
                flex-direction: column;
                align-items: center;
            }

            .stat-card {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4 section-title">
        <div class="dashboard-header mb-0">الرئيسية</div>
    </div>

    <div class="stats-container">
        <div class="stat-card student-card">
            <div class="card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                </svg>
            </div>
            <div class="card-content">
                <h3 class="card-title">الطلاب</h3>
                <p class="card-value">{{ $studentCount }}</p>
            </div>
        </div>

        <div class="stat-card course-card">
            <div class="card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z" />
                </svg>
            </div>
            <div class="card-content">
                <h3 class="card-title">المساقات</h3>
                <p class="card-value">{{ $courseCount }}</p>
            </div>
        </div>

        <div class="stat-card summary-card">
            <div class="card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z" />
                </svg>
            </div>
            <div class="card-content">
                <h3 class="card-title">الملخصات</h3>
                <p class="card-value">{{ $summaryCount }}</p>
            </div>
        </div>
    </div>




@endsection