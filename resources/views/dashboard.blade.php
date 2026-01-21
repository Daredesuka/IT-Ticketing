<x-ticket-layout>
    <x-slot name="header">Dashboard</x-slot>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Tiket -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-500 mb-2">Total Tiket</p>
                    <h3 class="text-3xl font-bold text-gray-900 mb-3">{{ $totalTickets }}</h3>
                    <div class="flex items-center text-sm">
                        <svg class="w-4 h-4 text-green-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-green-600 font-medium">12%</span>
                        <span class="text-gray-500 ml-1">vs bulan lalu</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Tiket Aktif -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-500 mb-2">Tiket Aktif</p>
                    <h3 class="text-3xl font-bold text-gray-900 mb-3">{{ $activeTickets }}</h3>
                    <div class="flex items-center text-sm">
                        <svg class="w-4 h-4 text-red-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-red-600 font-medium">3%</span>
                        <span class="text-gray-500 ml-1">vs bulan lalu</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-yellow-50 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Selesai -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-500 mb-2">Selesai</p>
                    <h3 class="text-3xl font-bold text-gray-900 mb-3">{{ $resolvedTickets }}</h3>
                    <div class="flex items-center text-sm">
                        <svg class="w-4 h-4 text-green-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-green-600 font-medium">8%</span>
                        <span class="text-gray-500 ml-1">vs bulan lalu</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Rata-rata Waktu -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-500 mb-2">Rata-rata Waktu</p>
                    <h3 class="text-3xl font-bold text-gray-900 mb-3">{{ number_format($avgResolutionTime, 1) }} Jam</h3>
                    <div class="flex items-center text-sm">
                        <svg class="w-4 h-4 text-red-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-red-600 font-medium">15%</span>
                        <span class="text-gray-500 ml-1">vs bulan lalu</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Tiket Terbaru -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">Tiket Terbaru</h3>
                    <a href="{{ route('tickets.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($recentTickets as $ticket)
                    <div class="p-4 hover:bg-gray-50 transition">
                        <div class="flex items-start justify-between mb-2">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 mb-1 truncate">{{ $ticket->title }}</h4>
                                <p class="text-sm text-gray-500 truncate">
                                    <span class="font-medium">{{ $ticket->code }}</span>
                                    <span class="mx-2">•</span>
                                    Dibuat pada {{ $ticket->created_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <button class="text-gray-400 hover:text-gray-600 p-1">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 flex-wrap">
                            @if($ticket->status == 'resolved')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Resolved
                                </span>
                            @elseif($ticket->status == 'in_progress')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    In Progress
                                </span>
                            @elseif($ticket->status == 'open')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Open
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    Rejected
                                </span>
                            @endif
                            
                            @if($ticket->priority == 'high')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    High
                                </span>
                            @elseif($ticket->priority == 'medium')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                    Medium
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Low
                                </span>
                            @endif
                            
                            <span class="text-xs text-gray-500 ml-1">{{ $ticket->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="p-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <p class="mt-2 text-sm text-gray-500">Belum ada tiket</p>
                        <a href="{{ route('tickets.create') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            Buat Tiket Pertama
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Distribusi Status -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Distribusi Status</h3>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-center mb-6">
                        <div class="relative" style="width: 200px; height: 200px;">
                            <!-- Simple Donut Chart -->
                            <svg viewBox="0 0 100 100" class="transform -rotate-90">
                                @php
                                    $total = $statusDistribution->sum();
                                    $offset = 0;
                                    $colors = [
                                        'open' => '#3B82F6',
                                        'in_progress' => '#F59E0B', 
                                        'resolved' => '#10B981',
                                        'rejected' => '#EF4444'
                                    ];
                                    $circumference = 2 * 3.14159 * 40;
                                @endphp
                                
                                <circle cx="50" cy="50" r="40" fill="none" stroke="#E5E7EB" stroke-width="12"/>
                                
                                @foreach($statusDistribution as $status => $count)
                                    @php
                                        $percentage = $total > 0 ? ($count / $total) : 0;
                                        $dashLength = $percentage * $circumference;
                                        $dashOffset = -$offset;
                                        $offset += $dashLength;
                                    @endphp
                                    <circle 
                                        cx="50" 
                                        cy="50" 
                                        r="40" 
                                        fill="none" 
                                        stroke="{{ $colors[$status] ?? '#6B7280' }}" 
                                        stroke-width="12"
                                        stroke-dasharray="{{ $dashLength }} {{ $circumference }}"
                                        stroke-dashoffset="{{ $dashOffset }}"
                                        stroke-linecap="round"
                                    />
                                @endforeach
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="text-center">
                                    <p class="text-3xl font-bold text-gray-900">{{ $total }}</p>
                                    <p class="text-xs text-gray-500">Total</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Legend -->
                    <div class="space-y-3">
                        @php
                            $statusLabels = [
                                'open' => 'Open',
                                'in_progress' => 'In Progress',
                                'resolved' => 'Resolved',
                                'rejected' => 'Rejected'
                            ];
                            $statusColors = [
                                'open' => 'bg-blue-500',
                                'in_progress' => 'bg-yellow-500',
                                'resolved' => 'bg-green-500',
                                'rejected' => 'bg-red-500'
                            ];
                        @endphp
                        @foreach($statusDistribution as $status => $count)
                        <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-0">
                            <div class="flex items-center space-x-3">
                                <span class="w-3 h-3 rounded-full {{ $statusColors[$status] ?? 'bg-gray-500' }} flex-shrink-0"></span>
                                <span class="text-sm font-medium text-gray-700">{{ $statusLabels[$status] ?? ucfirst($status) }}</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-900">{{ $count }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-ticket-layout>