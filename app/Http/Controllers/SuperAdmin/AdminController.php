<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SuperAdmin\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    public function index(Request $request)
    {
        $users = $this->adminService->fetchUsers($request->input('search'));
        return view('superAdmin.admin.index', compact('users'));
    }


    // دالة الترقية إلى أدمن
    public function promoteToAdmin(User $user)
    {
        try {
            $this->adminService->promoteStudentToAdmin($user);
            return redirect()->route('super_admin.students.index')->with('success', "تم ترقية {$user->name} إلى أدمن.");
        } catch (\Exception $e) {
            Log::error("Error promoting user {$user->id} to admin: " . $e->getMessage());
            return redirect()->route('super_admin.students.index')->with('error', 'حدث خطأ أثناء الترقية.');
        }
    }

    public function revoke(User $user)
    {
        try {
            $this->adminService->revokeAdmin($user);
            return back()->with('success', "تم إلغاء صلاحيات الأدمن لـ {$user->name}.");
        } catch (\DomainException $e) {          // المستخدم ليس أدمن
            return back()->with('error', $e->getMessage());
        } catch (\Exception $e) {               // خطأ غير متوقع
            Log::error("Error revoking admin privileges for user {$user->id}: " . $e->getMessage());
            return back()->with('error', 'حدث خطأ أثناء إلغاء صلاحيات الأدمن.');
        }
    }

}
