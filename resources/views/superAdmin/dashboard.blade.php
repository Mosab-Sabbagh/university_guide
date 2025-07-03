@extends('SuperAdmin.layouts.app')
@section('title', 'الرئيسية')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="admin-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">إجمالي المستخدمين</h6>
                        <h3 class="mb-0">{{ $usersCount }}</h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                        <i class="fas fa-users text-primary fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="admin-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">إجمالي الجامعات</h6>
                        <h3 class="mb-0">{{ $universitiesCount }}</h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                        <i class="fas fa-university text-primary fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="admin-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">إجمالي الكليات</h6>
                        <h3 class="mb-0">{{ $collegesCount }}</h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                        <i class="fas fa-school  text-primary fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="admin-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">إجمالي التخصصات</h6>
                        <h3 class="mb-0">{{ $majorsCount }}</h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                        <i class="fas fa-book text-primary fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
