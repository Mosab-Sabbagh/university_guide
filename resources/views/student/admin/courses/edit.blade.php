@extends('student.admin.layouts.app')
@section('title', 'تعديل مساق')

@section('content')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">تعديل المساق</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.course.update',$course->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="name_ar" class="form-label">الاسم بالعربي</label>
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{$course->name_ar}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="name_en" class="form-label">الاسم بالإنجليزي</label>
                                    <input type="text" class="form-control" id="name_en" name="name_en"  value="{{$course->name_en}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="code" class="form-label">الكود</label>
                                    <input type="text" class="form-control" id="code" name="code"  value="{{$course->code}}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">الوصف</label>
                                <textarea class="form-control" id="description" name="description" rows="4"
                                    required>
                                    {{$course->description}}
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus ml-1"></i>
                                تعديل
                            </button>
                            <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-times mr-1"></i> إلغاء
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection