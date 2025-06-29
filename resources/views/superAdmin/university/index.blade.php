@extends('superAdmin.layouts.app')
@section('title', ' إدارة الجامعات')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>إدارة الجامعات</h2>
        <a href="{{ route('super_admin.university.add') }}" class="btn btn-primary">
            <i class="fas fa-plus ml-1"></i>
            إضافة جامعة جديدة
        </a>
    </div>
    
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>اسم الجامعة (عربي)</th>
                            <th>اسم الجامعة (إنجليزي)</th>
                            <th>الاختصار</th>
                            <th>البريد</th>
                            <th>العنوان</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($universities as $university)
                        <tr>
                            <td>{{ $university->name_ar }}</td>
                            <td>{{ $university->name_en }}</td>
                            <td>{{ $university->abbreviation }}</td>
                            <td>{{ $university->email }}</td>
                            <td>{{ $university->address }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('super_admin.university.edit', $university->id) }}" class="btn btn-sm btn-warning" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('super_admin.university.destroy', $university->id) }}" method="POST" class="delete-form" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete-university" title="حذف">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">لا يوجد جامعات مسجلة</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $universities->links() }}
            </div>
        </div>
    </div>
</div>
@endsection