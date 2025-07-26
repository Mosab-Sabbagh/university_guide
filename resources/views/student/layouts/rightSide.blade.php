<!-- Sidebar (قائمة التنقل الرئيسية) -->
<div class="sidebar">
    <div class="nav flex-column sticky">
        @if (Auth::user()->user_type == 'student' && Auth::user()->is_admin)
            <a class="nav-link" href="{{ route('admin') }}" style="display: inline-block;
                        padding: 10px 20px;
                        background: linear-gradient(to right, #28a745, #a8e063);
                        color: white;
                        font-weight: bold;
                        border: none;
                        border-radius: 8px;
                        text-decoration: none;
                        margin-bottom: 10px;">
                <i class="fa fa-tachometer"></i> <span> لوحة التحكم </span>
            </a>
        @endif

        <a href="{{route('student.help_requests.index')}}"
            class="nav-link , {{ request()->routeIs('student.help_requests.index') ? 'active' : '' }}">
            <i class="fa fa-comments"></i> <span>ركن المساعدة الاكاديمية</span></a>

        <a href="{{route('student.summaries.index')}}"
            class="nav-link , {{ request()->routeIs('student.summaries.index') ? 'active' : '' }}">
            <i class="fa fa-layer-group"></i> <span>  الملخصات</span></a>
        <a class="nav-link" href="#"><i class="fa fa-layer-group"></i> <span>دليل المساقات</span></a>
        <a class="nav-link" href="#"><i class="fa fa-book"></i> <span>سوق الكتب</span></a>
        <a class="nav-link" href="#"><i class="fa fa-book"></i> <span> الكتب الالكترونية</span></a>
        <a class="nav-link" href="#"><i class="fa fa-users"></i> <span>الطلاب</span></a>
        <a class="nav-link" href="#"><i class="fa fa-users"></i> <span>المدرسين</span></a>
    </div>
</div>