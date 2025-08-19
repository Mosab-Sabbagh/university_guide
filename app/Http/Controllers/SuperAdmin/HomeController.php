<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\HelpRequest;
use App\Models\Student;
use App\Models\Summary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Services\SuperAdmin\UniversityService;

class HomeController extends Controller
{
    protected $universityService;

    public function __construct(UniversityService $universityService)
    {
        $this->universityService = $universityService;
    }

    public function index()
    {
        $cacheKey = 'dashboard:stats';

        $data = Cache::remember($cacheKey, now()->addHours(6), function () {
            return [
                'universities' => $this->getCachedUniversities(),
                'post_count' => HelpRequest::count(),
                'summary_count' => Summary::count(),
                'student_count' => Student::count()
            ];
        });

        return view('welcome', $data);
    }

    protected function getCachedUniversities()
    {
        return Cache::remember('universities:dashboard', now()->addHours(6), function () {
            return University::select('name_ar', 'logo')
                ->orderBy('name_ar')
                ->get();
        });
    }

    /**
     * مسح كاش الصفحة الرئيسية (يمكن استدعاؤه من UniversityService عند التحديثات)
     */
    public static function clearDashboardCache()
    {
        Cache::forget('dashboard:stats');
        Cache::forget('universities:dashboard');
    }
}
