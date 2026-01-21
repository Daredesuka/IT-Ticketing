<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTickets = Ticket::count();
        $activeTickets = Ticket::whereIn('status', ['open', 'in_progress'])->count();
        $resolvedTickets = Ticket::where('status', 'resolved')->count();
        
        // Hitung rata-rata waktu penyelesaian dalam jam
        $avgResolutionTime = Ticket::whereNotNull('completed_at')
            ->selectRaw('AVG(TIMESTAMPDIFF(HOUR, created_at, completed_at)) as avg_hours')
            ->first()
            ->avg_hours ?? 0;
        
        // Ticket terbaru
        $recentTickets = Ticket::with('user')
            ->latest()
            ->take(5)
            ->get();
        
        // Distribusi status untuk chart
        $statusDistribution = Ticket::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');
        
        return view('dashboard', compact(
            'totalTickets',
            'activeTickets', 
            'resolvedTickets',
            'avgResolutionTime',
            'recentTickets',
            'statusDistribution'
        ));
    }
}