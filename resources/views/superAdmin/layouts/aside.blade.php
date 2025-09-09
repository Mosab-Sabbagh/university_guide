    <aside class="admin-sidebar">
        <div class="sidebar-header">
            <h3>لوحة التحكم</h3>
        </div>
        
        <ul class="sidebar-menu">
            <li>
                <a href="{{route('super_admin.dashboard')}}" class="{{ request()->routeIs('super_admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home ml-2"></i>
                    الرئيسية
                </a>
            </li>
            <li>
                <a href="{{ route('super_admin.university.index') }}" class="{{ request()->routeIs('super_admin.university.index') ? 'active' : '' }}">
                    <i class="fas fa-university ml-2"></i>
                    الجامعات
                </a>
            </li>
            <li>
                <a href="{{ route('super_admin.college.index') }}" class="{{ request()->routeIs('super_admin.college.index') ? 'active' : '' }}">
                    <i class="fas fa-school ml-2"></i>    الكليات
                </a>
            </li>
            <li>
                <a href="{{ route('super_admin.major.index') }}" class="{{ request()->routeIs('super_admin.major.index') ? 'active' : '' }}">
                    <i class="fas fa-book ml-2"></i>    التخصصات 
                </a>
            </li>
            <li>
                <a href="{{ route('super_admin.students.index') }}" class="{{ request()->routeIs('super_admin.students.index') ? 'active' : '' }}">
                    <i class="fas fa-user-shield ml-2"></i>    المسؤولين     
                </a>
            </li>
            {{-- <li>
                <ul>
                    <li><a href="{{ route('admin.export.summaries') }}" class="{{ request()->routeIs('admin.export.*') ? 'active' : '' }}">
                        <i class="fas fa-user-shield ml-2"></i>ملخصات      
                        </a>
                    </li>
                    <li><a href="{{ route('admin.export.Book') }}" class="{{ request()->routeIs('admin.export.*') ? 'active' : '' }}">
                        <i class="fas fa-user-shield ml-2"></i>الكتب       
                        </a>
                    </li>
                    <li><a href="{{ route('admin.export.University') }}" class="{{ request()->routeIs('admin.export.*') ? 'active' : '' }}">
                        <i class="fas fa-user-shield ml-2"></i>الجامعات       
                        </a>
                    </li>
                </ul>
            </li> --}}
        <div class="nav-item dropdown">
            <a href=""
                class="nav-link dropdown-toggle {{ request()->routeIs('admin.export.*')  ? 'active' : '' }}"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-book"></i> <span>  استخراج البيانات </span>
            </a>
            <ul class="dropdown-menu " style="background-color: #28035b;">
                <li>
                    <a href="{{route('admin.export.Course')}}"
                        class="dropdown-item {{ request()->routeIs('admin.export.Course') ? 'active' : '' }}">
                        المساقات
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.export.summaries')}}"
                        class="dropdown-item {{ request()->routeIs('admin.export.summaries') ? 'active' : '' }}">
                        الملخصات
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.export.Book')}}"
                        class="dropdown-item {{ request()->routeIs('admin.export.Book') ? 'active' : '' }}">
                        الكتب
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.export.University')}}"
                        class="dropdown-item {{ request()->routeIs('admin.export.University') ? 'active' : '' }}">
                        الجامعات
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.export.College')}}"
                        class="dropdown-item {{ request()->routeIs('admin.export.College') ? 'active' : '' }}">
                        الكليات
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.export.Major')}}"
                        class="dropdown-item {{ request()->routeIs('admin.export.Major') ? 'active' : '' }}">
                        التخصصات
                    </a>
                </li>
            </ul>
        </div>    
            <li>
                <a href="#" class="">
                    <i class="fas fa-cog ml-2"></i>
                    الإعدادات
                </a>
            </li>
        </ul>
    </aside>