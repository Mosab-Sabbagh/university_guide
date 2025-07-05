@extends('student.layouts.app')
@section('title','test title')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="dashboard-header mb-0">ركن المساعدة الاكاديمية</div>
            <a class="btn btn-success d-flex align-items-center gap-2" style="border-radius: 8px; font-weight:500; font-size:1rem;" data-bs-toggle="modal" data-bs-target="#addPostModal">
                <i class="fa fa-plus"></i>
                    طلب مساعدة أكاديمية
            </a>
    </div>
    
    <div class="table-responsive">
            <p>جدول تجريبي</p>
            <table class="table table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th>الاسم  </th>
                        <th>التخصص</th>
                        <th>النقاط</th>
                        <th>الشارة</th>
                        <th>رقم الهاتف</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>مصعب الصباغ</td>
                        <td>تطوير برمجيات</td>
                        <td>145</td>
                        <td><i class="fas fa-star text-warning"></i></td>
                        <td>05944484845</td>
                    </tr>
                    <tr>
                        <td>مصعب الصباغ</td>
                        <td>تطوير برمجيات</td>
                        <td>145</td>
                        <td><i class="fas fa-star text-warning"></i></td>
                        <td>05944484845</td>
                    </tr>
                    <tr>
                        <td>مصعب الصباغ</td>
                        <td>تطوير برمجيات</td>
                        <td>145</td>
                        <td><i class="fas fa-star text-warning"></i></td>
                        <td>05944484845</td>
                    </tr>
                    <tr>
                        <td>مصعب الصباغ</td>
                        <td>تطوير برمجيات</td>
                        <td>145</td>
                        <td><i class="fas fa-star text-warning"></i></td>
                        <td>05944484845</td>
                    </tr>
                    <tr>
                        <td>مصعب الصباغ</td>
                        <td>تطوير برمجيات</td>
                        <td>145</td>
                        <td><i class="fas fa-star text-warning"></i></td>
                        <td>05944484845</td>
                    </tr>
                    <tr>
                        <td>مصعب الصباغ</td>
                        <td>تطوير برمجيات</td>
                        <td>145</td>
                        <td><i class="fas fa-star text-warning"></i></td>
                        <td>05944484845</td>
                    </tr>
                    <tr>
                        <td>مصعب الصباغ</td>
                        <td>تطوير برمجيات</td>
                        <td>145</td>
                        <td><i class="fas fa-star text-warning"></i></td>
                        <td>05944484845</td>
                    </tr>
                    <tr>
                        <td>مصعب الصباغ</td>
                        <td>تطوير برمجيات</td>
                        <td>145</td>
                        <td><i class="fas fa-star text-warning"></i></td>
                        <td>05944484845</td>
                    </tr>
                    <tr>
                        <td>مصعب الصباغ</td>
                        <td>تطوير برمجيات</td>
                        <td>145</td>
                        <td><i class="fas fa-star text-warning"></i></td>
                        <td>05944484845</td>
                    </tr>
                    <tr>
                        <td>مصعب الصباغ</td>
                        <td>تطوير برمجيات</td>
                        <td>145</td>
                        <td><i class="fas fa-star text-warning"></i></td>
                        <td>05944484845</td>
                    </tr>
                    <tr>
                        <td>مصعب الصباغ</td>
                        <td>تطوير برمجيات</td>
                        <td>145</td>
                        <td><i class="fas fa-star text-warning"></i></td>
                        <td>05944484845</td>
                    </tr>
                </tbody>
            </table>
    </div>   
@endsection