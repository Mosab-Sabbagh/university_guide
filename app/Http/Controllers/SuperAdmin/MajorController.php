<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MajorRequest;
use App\Models\Major;
use App\Services\SuperAdmin\CollegeService;
use App\Services\SuperAdmin\MajorService;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public $majorService;
    public function __construct(MajorService $majorService)
    {
        $this->majorService = $majorService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $majors= $this->majorService->getAllMajors($search);
        return view('superAdmin.major.index', compact('majors'));
    }

    public function create(CollegeService $collegeService)
    {
        $colleges = $collegeService->getAllCollegesWithoutPagination();
        return view('superAdmin.major.create', compact('colleges'));
    }

    public function store(MajorRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $this->majorService->createMajor($validatedData);
            return redirect()
                ->route('super_admin.major.index')
                ->with('success', 'تم إضافة التخصص بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة التخصص: ' );
        }
        
    }

    public function edit($major, CollegeService $collegeService)
    {
        try {
            $major = $this->majorService->getMajorById($major);
            $colleges = $collegeService->getAllCollegesWithoutPagination();
            return view('superAdmin.major.edit', compact('major', 'colleges'));
        } catch (\Exception $e) {
            return redirect()
                ->route('super_admin.major.index')
                ->with('error', 'حدث خطأ أثناء جلب بيانات التخصص');
        }
    }

    public function update(MajorRequest $request, Major $major)
    {
        $validatedData = $request->validated();
        try {
            $this->majorService->updateMajor($major, $validatedData);
            return redirect()
                ->route('super_admin.major.index')
                ->with('success', 'تم تحديث التخصص بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث التخصص: ');
        }
    }

    public function destroy($major)
    {
        try {
            $major = $this->majorService->getMajorById($major);
            $this->majorService->deleteMajor($major);
            return redirect()
                ->route('super_admin.major.index')
                ->with('success', 'تم حذف التخصص بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'حدث خطأ أثناء حذف التخصص: ' );
        }
    }

}
