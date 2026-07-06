<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('public.faq', compact('faqs'));
    }
}
