<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\JsonResponse;

class FaqController extends Controller
{
    public function index(): JsonResponse
    {
        $faqs = Faq::where('is_published', true)
            ->select('id', 'pertanyaan', 'jawaban', 'created_at')
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($faq) {
                $faq->jawaban = strip_tags($faq->jawaban);
                return $faq;
            });

        return response()->json([
            'success' => true,
            'data' => $faqs,
        ]);
    }
}
