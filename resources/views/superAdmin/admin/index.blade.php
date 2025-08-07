@extends('superAdmin.layouts.app')
@section('title','المسؤولين')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2> المسؤولين</h2>
    </div>

    <form method="GET" action="{{ route('super_admin.students.index') }}" class="mb-3 d-flex align-items-center gap-2">
        <input type="text" name="search" placeholder="ابحث باسم الطالب أو البريد الإلكتروني" value="{{ request('search') }}" class="form-control" />
        <button type="submit" class="btn btn-primary">بحث</button>
        <a href="{{ route('super_admin.students.index') }}" class="btn btn-secondary">إعادةالبحث</a>
    </form>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>الإيميل</th>
                            <th>النوع</th>
                            <th>الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->user_type }}</td>
                            <td>
                            @if($user->is_admin == true)
                                <form method="POST" action="{{ route('super_admin.admin.revoke', $user->id) }}" id="revoke-form-{{ $user->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="button" class="btn btn-danger btn-sm revoke-btn" data-id="{{ $user->id }}">إلغاء الصلاحية</button>
                                </form>
                            @elseif($user->is_admin == false )
                                <form method="POST" action="{{ route('super_admin.admin.promote', $user->id) }}" id="promote-form-{{ $user->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="button" class="btn btn-success btn-sm promote-btn" data-id="{{ $user->id }}">ترقية إلى أدمن</button>
                                </form>
                            @endif

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">لا يوجد نتائج</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ترقية طالب
            document.querySelectorAll('.promote-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    const studentId = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'هل أنت متأكد؟',
                        text: 'سيتم ترقية هذا الطالب إلى أدمن!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'نعم، قم بالترقية',
                        cancelButtonText: 'إلغاء'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(`promote-form-${studentId}`).submit();
                        }
                    });
                });
            });

            // إلغاء صلاحية الأدمن
            document.querySelectorAll('.revoke-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    const adminId = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'هل أنت متأكد؟',
                        text: 'سيتم إلغاء صلاحية هذا الأدمن وإرجاعه لطالب!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#aaa',
                        confirmButtonText: 'نعم، إلغاء الصلاحية',
                        cancelButtonText: 'إلغاء'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(`revoke-form-${adminId}`).submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
