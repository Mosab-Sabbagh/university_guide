<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top"
    style="border-bottom:1px solid #e0e0e0; z-index:100;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <span class="user-avatar" style="width:36px;height:36px;font-size:1.1rem;"> <i class="fa fa-user"></i>
            </span>
            <span style="font-weight:600; color:#198754;">مرحباً، {{Auth::user()->name}}</span>
        </div>
        <div>
            <h4 class="text-success">منصة دليلي الجامعي</h6>
        </div>
        <div class="d-flex align-items-center gap-3">
            <a href="#" class="text-secondary" title="إعدادات الحساب"><i class="fa fa-cog fa-lg"></i></a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item">
                <span class="text-danger">
                    <i class="fa fa-sign-out-alt fa-lg"></i>
                </span>
            </button>
        </form>
        </div>
    </div>
</nav>