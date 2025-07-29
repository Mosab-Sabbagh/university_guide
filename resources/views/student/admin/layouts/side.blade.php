<!-- Sidebar (قائمة التنقل الرئيسية) -->
<div class="sidebar">
    <div class="nav flex-column sticky">
        @if (Auth::user()->user_type == 'student' && Auth::user()->is_admin)
            <a class="nav-link" href="{{ route('student.help_requests.index') }}" style="display: inline-block;
                                padding: 10px 20px;
                                background: linear-gradient(to right, #28a745, #a8e063);
                                color: white;
                                font-weight: bold;
                                border: none;
                                border-radius: 8px;
                                text-decoration: none;
                                margin-bottom: 10px;">
                <i class="fa fa-forward"></i> <span> الانتقال لتصفح المنصة </span>
            </a>
        @endif

        <a href="{{route('admin.dashboard')}}"
            class="nav-link , {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fa fa-home"></i> <span>الرئيسية</span></a>

        <a href="{{route('admin.courses.index')}}"
            class="nav-link , {{ request()->routeIs('admin.courses.index') ? 'active' : '' }}"><i
                class="fa fa-book"></i> <span> المساقات</span></a>

        <a href="{{route('admin.summaries.index')}}"
            class="nav-link , {{ request()->routeIs('admin.summaries.index') ? 'active' : '' }}"><i
                class="fa fa-book"></i> <span> الملخصات</span></a>

        <a href="{{route('admin.books.index')}}"
            class="nav-link , {{ request()->routeIs('admin.books.index') ? 'active' : '' }}"><i
                class="fa fa-book"></i> <span> الكتب الالكترونية</span></a>
    </div>
</div>