<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // Menampilkan semua ticket
    public function index()
    {
        $tickets = Ticket::with('user')
            ->latest()
            ->paginate(10);
        
        return view('tickets.index', compact('tickets'));
    }

    // Form buat ticket baru
    public function create()
    {
        return view('tickets.create');
    }

    // Simpan ticket baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required|in:low,medium,high'
        ]);

        $validated['user_id'] = Auth::id();

        Ticket::create($validated);

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket berhasil dibuat!');
    }

    // Menampilkan detail ticket
    public function show(Ticket $ticket)
    {
        $ticket->load(['user', 'replies.user']);
        return view('tickets.show', compact('ticket'));
    }

    // Form edit ticket
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    // Update ticket
    public function update(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:open,in_progress,resolved,rejected'
        ]);

        // Set completed_at jika status resolved atau rejected
        if (in_array($validated['status'], ['resolved', 'rejected'])) {
            $validated['completed_at'] = now();
        }

        $ticket->update($validated);

        return redirect()->route('tickets.show', $ticket)
            ->with('success', 'Ticket berhasil diupdate!');
    }

    // Hapus ticket
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket berhasil dihapus!');
    }

    // Tambah reply ke ticket
    public function addReply(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'content' => 'required'
        ]);

        $validated['user_id'] = Auth::id();
        $validated['ticket_id'] = $ticket->id;

        TicketReply::create($validated);

        return redirect()->route('tickets.show', $ticket)
            ->with('success', 'Reply berhasil ditambahkan!');
    }
}