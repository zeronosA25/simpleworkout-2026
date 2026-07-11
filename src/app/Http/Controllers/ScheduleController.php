<?php

namespace App\Http\Controllers;

use App\Models\JadwalPengguna;
use App\Models\TemplateJadwal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(): View
    {
        $templates = TemplateJadwal::with('hariJadwal.detailJadwal.workout')->get();

        return view('public.schedules.index', compact('templates'));
    }

    public function show(string $slug): View
    {
        $template = TemplateJadwal::where('slug', $slug)
            ->with(['hariJadwal' => function ($q) {
                $q->orderBy('urutan_hari');
            }, 'hariJadwal.detailJadwal' => function ($q) {
                $q->orderBy('urutan_gerakan');
            }, 'hariJadwal.detailJadwal.workout'])
            ->firstOrFail();

        $checklist = [];
        if (auth()->check()) {
            $hariIds = $template->hariJadwal->pluck('id');
            $checklist = JadwalPengguna::where('user_id', auth()->id())
                ->whereIn('hari_jadwal_id', $hariIds)
                ->pluck('is_checked', 'hari_jadwal_id')
                ->toArray();
        }

        return view('public.schedules.show', compact('template', 'checklist'));
    }

    public function toggleChecklist(Request $request): JsonResponse
    {
        $request->validate([
            'hari_jadwal_id' => 'required|exists:hari_jadwal,id',
        ]);

        $jadwal = JadwalPengguna::firstOrNew([
            'user_id' => auth()->id(),
            'hari_jadwal_id' => $request->hari_jadwal_id,
        ]);

        $jadwal->is_checked = !$jadwal->is_checked;
        $jadwal->checked_at = $jadwal->is_checked ? now() : null;
        $jadwal->save();

        return response()->json([
            'success' => true,
            'is_checked' => $jadwal->is_checked,
        ]);
    }

    public function subscribe(string $slug): RedirectResponse
    {
        $template = TemplateJadwal::where('slug', $slug)
            ->with('hariJadwal')
            ->firstOrFail();

        foreach ($template->hariJadwal as $hari) {
            JadwalPengguna::firstOrCreate(
                [
                    'user_id' => auth()->id(),
                    'hari_jadwal_id' => $hari->id,
                ],
                [
                    'is_checked' => false,
                    'checked_at' => null,
                ]
            );
        }

        return redirect()
            ->route('schedules.show', $slug)
            ->with('success', 'Kamu sudah mendaftar jadwal ini! Centang setiap hari setelah selesai latihan. Kamu akan menerima pengingat via email setiap pagi.');
    }
}
