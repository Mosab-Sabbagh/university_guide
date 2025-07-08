<?php 
namespace App\Services\Student;

use App\Models\HelpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HelpRequestService
{

    public function getAllHelpRequests()
    {
        return HelpRequest::where('college_id', Auth::user()->student->college_id)
            ->with(['user', 'college'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function store(array $data)
    {
        DB::beginTransaction();
        try {
            $imagePath = isset($data['image'])
                ? $data['image']->store('help_requests', 'public')
                : null;

            $helpRequest = HelpRequest::create([
                'user_id'    => Auth::id(),
                'college_id' => Auth::user()->student?->college_id,
                'title'      => $data['title'],
                'content'    => $data['content'],
                'image'      => $imagePath,
            ]);

            DB::commit();
            return $helpRequest;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}

