<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TemplateJadwal;
use Illuminate\Http\JsonResponse;

class ScheduleController extends Controller
{
    public function index(): JsonResponse
    {
        $templates = TemplateJadwal::select('id', 'nama_template', 'slug', 'deskripsi', 'jumlah_hari_per_minggu')
            ->orderBy('nama_template')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $templates,
        ]);
    }

    public function show(string $slug): JsonResponse
    {
        $template = TemplateJadwal::where('slug', $slug)
            ->with(['hariJadwal' => function ($q) {
                $q->orderBy('urutan_hari')->select('id', 'template_jadwal_id', 'nama_hari', 'urutan_hari');
            }, 'hariJadwal.detailJadwal' => function ($q) {
                $q->orderBy('urutan_gerakan')->select('id', 'hari_jadwal_id', 'gerakan_id', 'urutan_gerakan');
            }, 'hariJadwal.detailJadwal.workout' => function ($q) {
                $q->where('is_published', true)->select('id', 'title', 'slug', 'type');
            }])
            ->first();

        if (! $template) {
            return response()->json([
                'success' => false,
                'message' => 'Template jadwal tidak ditemukan.',
            ], 404);
        }

        $data = [
            'id' => $template->id,
            'nama_template' => $template->nama_template,
            'slug' => $template->slug,
            'deskripsi' => $template->deskripsi,
            'jumlah_hari_per_minggu' => $template->jumlah_hari_per_minggu,
            'hari' => $template->hariJadwal->map(function ($hari) {
                return [
                    'id' => $hari->id,
                    'nama_hari' => $hari->nama_hari,
                    'urutan_hari' => $hari->urutan_hari,
                    'gerakan' => $hari->detailJadwal->map(function ($detail) {
                        return [
                            'id' => $detail->id,
                            'urutan' => $detail->urutan_gerakan,
                            'title' => $detail->workout->title ?? null,
                            'slug' => $detail->workout->slug ?? null,
                        ];
                    }),
                ];
            }),
        ];

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }
}
