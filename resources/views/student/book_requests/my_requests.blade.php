@extends('student.layouts.app')
@section('title', 'عروضي في سوق الكتب')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4 section-title">
        <div class="dashboard-header mb-0">طلباتي في سوق الكتب</div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($bookRequests->isEmpty())
                    <p>لا توجد عروضي في سوق الكتب.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>مقدم العرض</th>
                                <th>عنوان الكتاب</th>
                                <th>مجاني/مدفوع</th>
                                <th>السعر (الشيكل)</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookRequests as $requests)
                                <tr>
                                    <td>{{ $requests->bookPost->user->name }}</td>
                                    <td>{{ $requests->bookPost->title }}</td>
                                    <td>{{ $requests->bookPost->is_free ? 'مجاني' : 'مدفوع' }}</td>
                                    <td>{{ $requests->bookPost->price ? $requests->bookPost->price : '0' }}</td>
                                    <td>
                                        @if ($requests->status == 'pending')
                                            <span class="badge bg-warning text-dark">قيد الانتظار</span>
                                        @elseif ($requests->status == 'accepted')
                                            <span class="badge bg-success">مقبول</span>
                                        @elseif ($requests->status == 'rejected')
                                            <span class="badge bg-danger">مرفوض</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection