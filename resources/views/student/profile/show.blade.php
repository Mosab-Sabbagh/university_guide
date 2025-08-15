@extends('student.layouts.app')

@section('title', 'الملف الشخصي')

@section('content')
    <div class="container py-5">
        <a href="{{ route('student.profile.edit') }}" class="btn btn-primary mb-4">
            <i class="fa fa-edit me-2"></i> تعديل الملف الشخصي
        </a>
        <div class="card shadow-lg border-0 rounded-4 p-4">
            <div class="row align-items-center">
                <!-- صورة الطالب -->
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    @if($student->student->profile_image)
                        <img src="{{ asset('storage/' . $student->student->profile_image) }}" alt="الصورة الشخصية"
                            class="rounded-circle shadow" width="150" height="150" style="object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-secondary d-inline-block"
                            style="width: 150px; height: 150px; line-height: 150px;">
                            <i class="fa fa-user fa-4x text-white"></i>
                        </div>
                    @endif
                    <h4 class="mt-3 mb-1 fw-bold">{{ $student->name }}</h4>
                    <p class="text-muted">{{ $student->email }}</p>
                </div>

                <!-- معلومات الطالب -->
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <strong>رقم الطالب:</strong>
                            <div>{{ $student->student->student_number ?? 'غير متوفر' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>الجامعة:</strong>
                            <div>{{ $student->student->university->name_ar ?? 'غير محدد' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>الكلية:</strong>
                            <div>{{ $student->student->college->name_ar ?? 'غير محدد' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>التخصص:</strong>
                            <div>{{ $student->student->major->name_ar ?? 'غير محدد' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>تاريخ الالتحاق:</strong>
                            <div>{{ $student->student->enrollment_date ?? 'غير محدد' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>المستوى الدراسي:</strong>
                            <div>{{ $student->student->level ?? 'غير محدد' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="postsContainer">
        @foreach($helpRequests as $helpRequest)
            <div class="post-card" id="post-{{ $helpRequest->id }}">
                <div class="post-header d-flex justify-content-between align-items-center">
                    {{-- معلومات المستخدم --}}
                    <div class="d-flex align-items-center">
                        {{-- الصورة --}}
                        @if($helpRequest->user && $helpRequest->user->student->profile_image)
                            <div class="post-avatar me-2">
                                <img src="{{ asset('storage/' . $helpRequest->user->student->profile_image) }}" alt="صورة المستخدم"
                                    class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                            </div>
                        @else
                            <div class="post-avatar me-2">
                                <i class="fa fa-user text-secondary" style="font-size: 20px;"></i>
                            </div>
                        @endif

                        {{-- الاسم والتاريخ --}}
                        <div>
                            <div class="post-user fw-bold">{{ $helpRequest->user->name ?? 'مستخدم' }}</div>
                            @if($helpRequest->created_at)
                                <div class="post-time text-muted small">{{ $helpRequest->created_at->diffForHumans() }}</div>
                            @endif
                        </div>
                    </div>

                    {{-- النقاط الثلاث (Dropdown) --}}
                    @if(Auth::id() === $helpRequest->user_id)
                        <div class="dropdown">
                            <button class="btn btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-h"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <button class="btn btn-sm btn-primary edit-post-btn" data-id="{{ $helpRequest->id }}"
                                        data-title="{{ $helpRequest->title }}" data-content="{{ $helpRequest->content }}"
                                        data-update-url="{{ route('student.help_requests.update', $helpRequest->id) }}">
                                        تعديل
                                    </button>
                                </li>
                                <li>
                                    <form action="{{route('student.help_requests.destroy', $helpRequest->id)}}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item btn-delete text-danger">حذف</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>

                {{-- محتوى المنشور --}}
                <div>
                    @if($helpRequest->title)
                        <span class="post-title blue">{{ $helpRequest->title }}</span>
                    @endif
                    <div style="white-space: pre-line;">{{ $helpRequest->content }}</div>
                    @if($helpRequest->image)
                        <img src="{{ asset('storage/' . $helpRequest->image) }}" class="post-image" alt="صورة منشور">
                    @endif
                </div>

                <div class="post-actions">
                    <span>
                        <i class="fa fa-comment"></i>
                        <span class="comment-count" id="comment-count-{{ $helpRequest->id }}">
                            {{ $helpRequest->comments()->count() }}
                        </span> تعليقات
                    </span>
                </div>
            </div>
        @endforeach
    </div>

@endsection

    @include('student.help_requests.create')


@section('script')
    <script src="{{ asset('js/help-request.js') }}"></script>
@endsection