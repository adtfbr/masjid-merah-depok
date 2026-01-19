<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ActivityLog::with('user');

        // Filter berdasarkan user
        if ($request->filled('user_id')) {
            $query->byUser($request->user_id);
        }

        // Filter berdasarkan tanggal
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('created_at', [
                $request->tanggal_mulai . ' 00:00:00',
                $request->tanggal_akhir . ' 23:59:59'
            ]);
        }

        // Search
        if ($request->filled('search')) {
            $query->where('aktivitas', 'like', '%' . $request->search . '%');
        }

        $logs = $query->latest('created_at')->paginate(30);
        $users = User::orderBy('name')->get();

        return view('activity-log.index', compact('logs', 'users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityLog $activityLog)
    {
        $activityLog->load('user');
        return view('activity-log.show', compact('activityLog'));
    }

    /**
     * Hapus log lama (bulk delete)
     */
    public function clear(Request $request)
    {
        $days = $request->input('days', 30);

        $deleted = ActivityLog::where('created_at', '<', now()->subDays($days))->delete();

        return back()->with('success', "Berhasil menghapus {$deleted} log aktivitas yang lebih lama dari {$days} hari.");
    }
}
