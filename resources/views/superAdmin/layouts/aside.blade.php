    <aside class="admin-sidebar">
        <div class="sidebar-header">
            <h3>لوحة التحكم</h3>
        </div>
        
        <ul class="sidebar-menu">
            <li>
                <a href="javascript:;" class="">
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
                <a href="#" class="">
                    <i class="fas fa-cog ml-2"></i>
                    الإعدادات
                </a>
            </li>
        </ul>
    </aside>