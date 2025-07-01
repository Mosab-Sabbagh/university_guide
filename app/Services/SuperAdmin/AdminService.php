<?php 
namespace App\Services\SuperAdmin;
use App\Models\User;
use App\Role\UserRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminService{

    /**
     * Fetch users with search logic.
     */
    public function fetchUsers(?string $search = null, int $perPage = 15)
    {
        $query = User::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name',  'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        } else {
            $query->where('user_type', 'admin');   // Only admins when not searching
        }

        return $query->paginate($perPage);
    }

    /**
     * Promote a student to admin.
     */
    public function promoteStudentToAdmin(User $user)
    {
        if ($user->user_type !== UserRole::STUDENT) {
            throw new \Exception('This user is not a student.');
        }

        DB::beginTransaction();
        try {
            $user->user_type = UserRole::ADMIN;
            $user->save();
            // Notify the user about the promotion
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Revoke admin privileges.
     */
    public function revokeAdmin(User $user): void
    {
        if ($user->user_type !== 'admin') {
            throw new \DomainException('This user is not an admin.');
        }

        DB::beginTransaction();
        try {
            $user->update(['user_type' => 'student']);
            // You can log an audit or send a notification here
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}