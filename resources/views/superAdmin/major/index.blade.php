@extends('superAdmin.layouts.app')
@section('title', ' التخصصات')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>التخصصات</h2>
        <a href="{{ route('super_admin.major.add') }}" class="btn btn-primary">
            <i class="fas fa-plus ml-1"></i>
            إضافة تخصص جديدة
        </a>
    </div>

    <form action="{{ route('super_admin.major.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="ابحث عن تخصص..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fas fa-search"></i> بحث
            </button>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary ms-2">
                <i class="fas fa-arrow-right"></i> رجوع
            </a>
        </div>
    </form>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>الكود</th>
                            <th>الكلية</th>
                            <th>الجامعة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($majors as $major)
                        <tr>
                            <td>{{ $major->name_ar }}</td>
                            <td>{{ $major->code }}</td>
                            <td>{{ $major->college->name_ar ?? '-' }}</td>
                            <td>{{ $major->college->university->name_ar ?? '-' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('super_admin.major.edit', $major->id) }}" class="btn btn-sm btn-warning" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('super_admin.major.destroy', $major->id) }}" method="POST" class="delete-form" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete-major" title="حذف">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">لا يوجد تخصصات مسجلة</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $majors->links() }}
            </div>
        </div>
    </div>
</div>

@endsection