<!-- Sidebar (قائمة التنقل الرئيسية) -->
<div class="sidebar">
    <div class="nav flex-column sticky">
        @if (Auth::user()->user_type == 'student' && Auth::user()->is_admin)
            <a class="nav-link" href="{{ route('admin.dashboard') }}" style="display: inline-block;
                                                padding: 10px 20px;
                                                background: linear-gradient(to right, #28a745, #a8e063);
                                                color: white;
                                                font-weight: bold;
                                                border: none;
                                                border-radius: 8px;
                                                text-decoration: none;
                                                margin-bottom: 10px;">
                <i class="fas fa-tachometer-alt"></i> <span> لوحة التحكم </span>
            </a>
        @endif

        <a href="{{route('student.help_requests.index')}}"
            class="nav-link {{ request()->routeIs('student.help_requests.index') ? 'active' : '' }}">
            <i class="fas fa-hands-helping"></i> <span>ركن المساعدة الاكاديمية</span></a>

        <a href="{{route('student.summaries.index')}}"
            class="nav-link {{ request()->routeIs('student.summaries.index') ? 'active' : '' }}">
            <i class="fas fa-file-alt"></i> <span> الملخصات</span></a>

        <a href="{{route('student.course_guide.index')}}"
            class="nav-link {{ request()->routeIs('student.course_guide.index') ? 'active' : '' }}">
            <i class="fas fa-map-signs"></i> <span> دليل المساقات</span></a>

        <a href="{{route('student.books.index')}}"
            class="nav-link {{ request()->routeIs('student.books.index') ? 'active' : '' }}">
            <i class="fas fa-book-open"></i> <span> الكتب الالكترونية </span></a>

        <!-- Dropdown Menu معدل -->
        <div class="nav-item dropdown">
            <a href=""
                class="nav-link dropdown-toggle {{ request()->routeIs('student.bookPosts.*') || request()->routeIs('student.bookRequests.*') ? 'active' : '' }}"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-book"></i> <span> سوق الكتب </span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{route('student.bookPosts.index')}}"
                        class="dropdown-item {{ request()->routeIs('student.bookPosts.index') ? 'active' : '' }}">
                        تصفح السوق
                    </a>
                </li>
                <li>
                    <a href="{{route('student.bookPosts.postsByUserId', Auth::id())}}"
                        class="dropdown-item {{ request()->routeIs('student.bookPosts.postsByUserId') ? 'active' : '' }}">
                        عروضي
                    </a>
                </li>
                <li>
                    <a href="{{route('student.bookRequests.myRequests', Auth::id())}}"
                        class="dropdown-item {{ request()->routeIs('student.bookRequests.myRequests') ? 'active' : '' }}">
                        طلباتي
                    </a>
                </li>
            </ul>
        </div>

        <a href="{{route('student.teachers.index')}}"
            class="nav-link {{ request()->routeIs('student.teachers.*') ? 'active' : '' }}">
            <i class="fas fa-chalkboard-teacher"></i> <span>المدرسين</span></a>
    </div>
</div>