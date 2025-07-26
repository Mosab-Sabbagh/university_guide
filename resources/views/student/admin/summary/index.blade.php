@extends('student.admin.layouts.app')
@section('title', 'الملخصات')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4 section-title">
        <div class="dashboard-header mb-0">الملخصات</div>
    </div>


    <div class="table-responsive">
        <form method="GET" action="">
            <div class="input-group mb-4">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                    placeholder="ابحث باسم المادة أو عنوان الملخص">
                <button class="btn btn-primary" type="submit">بحث</button>
                <a href="{{route('admin.summaries.index')}}" class="btn btn-secondary" type="submit">رجوع</a>
            </div>
        </form>

        <table class="table table-striped table-bordered align-middle text-center rounded shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>العنوان</th>
                    <th>الوصف</th>
                    <th>المادة</th>
                    <th>مضاف من</th>
                    <th>اجرءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($summaries as $summary)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $summary->title }}</td>
                        <td>{{ Str::limit($summary->description, 50) }}</td>
                        <td>{{ $summary->course->name_ar ?? 'غير معروف' }}</td>
                        <td>{{ $summary->user->name ?? 'غير معروف' }}</td>
                        <td>
                            {{-- @delete --}}
                            <form action="{{ route('admin.summary.delete', $summary->id) }}" method="POST"  class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-outline-danger btn-sm">
                                    حذف الملف
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">لا يوجد ملخصات حاليًا.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            {{ $summaries->links() }}
        </div>
    </div>

@endsection