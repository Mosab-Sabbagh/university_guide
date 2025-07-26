@extends('student.layouts.app')
@section('title', 'الملخصات')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4 section-title" style="">
        <div class="dashboard-header mb-0">الملخصات</div>
        <button class="btn btn-success d-flex align-items-center gap-2"
            style="border-radius: 8px; font-weight:500; font-size:1rem;" data-bs-toggle="modal"
            data-bs-target="#addPostModal">
            <i class="fa fa-plus"></i>
            إضافة تلخيص
        </button>
    </div>

    @include('student.summary.create')

    <div class="table-responsive">
        <form method="GET" action="">
            <div class="input-group mb-4">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                    placeholder="ابحث باسم المادة أو عنوان الملخص">
                <button class="btn btn-primary" type="submit">بحث</button>
                <a href="{{route('student.summaries.index')}}" class="btn btn-secondary" type="submit">رجوع</a>
            </div>
        </form>


        <table class="table table-striped table-bordered align-middle text-center rounded shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>العنوان</th>
                    <th>الوصف</th>
                    <th>المادة</th>
                    <th>الملف</th>
                    <th>مضاف من</th>
                </tr>
            </thead>
            <tbody>
                @forelse($summaries as $summary)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $summary->title }}</td>
                        <td>{{ Str::limit($summary->description, 50) }}</td>
                        <td>{{ $summary->course->name_ar ?? 'غير معروف' }}</td>
                        <td>
                            <a href="{{ route('summaries.download', $summary->id) }}" class="btn btn-outline-primary btn-sm">
                                تحميل الملف
                            </a>
                        </td>

                        <td>{{ $summary->user->name ?? 'غير معروف' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">لا يوجد ملخصات حاليًا.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            {{ $summaries->links() }}
        </div>
    </div>


@endsection