<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top"
    style="border-bottom:1px solid #e0e0e0; z-index:100;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div>
            <h4 class="text-success">منصة دليلي الجامعي</h6>
        </div>

        <div class="dropdown d-flex align-items-center gap-2">
            @if(Auth::user() && Auth::user()->student->profile_image)
                <div class="post-avatar">
                    <img src="{{ asset('storage/' . Auth::user()->student->profile_image) }}" alt="صورة المستخدم"
                        class="rounded-circle" style="width:36px;height:36px;font-size:1.1rem;">
                </div>
            @else
                <span class="user-avatar" style="width:36px;height:36px;font-size:1.1rem;">
                    <i class="fa fa-user"></i>
                </span>
            @endif
            <button class="btn btn-link dropdown-toggle p-0" type="button" id="userDropdown" data-bs-toggle="dropdown"
                aria-expanded="false" style="font-weight:600; color:#198754; text-decoration:none;">
                مرحباً، {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li>
                    <a class="dropdown-item" href="{{route('student.profile.show')}}">
                        <i class="fa fa-user-circle me-2"></i>
                        الملف الشخصي
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-key me-2"></i>
                        تغيير كلمة المرور
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <span class="text-danger">
                                <i class="fa fa-sign-out-alt fa-lg"></i>
                                تسجيل خروج
                            </span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>