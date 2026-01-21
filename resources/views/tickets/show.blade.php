<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Ticket') }}
            </h2>
            <a href="{{ route('tickets.index') }}" class="text-gray-600 hover:text-gray-900">Kembali</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-6">
                        <h3 class="text-2xl font-bold mb-2">{{ $ticket->title }}</h3>
                        <p class="text-gray-600 mb-3">
                            <strong>{{ $ticket->code }}</strong> | 
                            Dibuat oleh: {{ $ticket->user->name }} | 
                            {{ $ticket->created_at->format('d M Y H:i') }}
                        </p>

                        <div class="mb-3">
                            @if($ticket->priority == 'high')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">High Priority</span>
                            @elseif($ticket->priority == 'medium')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Medium Priority</span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Low Priority</span>
                            @endif

                            @if($ticket->status == 'open')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Open</span>
                            @elseif($ticket->status == 'in_progress')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">In Progress</span>
                            @elseif($ticket->status == 'resolved')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Resolved</span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Rejected</span>
                            @endif
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <h5 class="font-semibold mb-2">Deskripsi:</h5>
                            <p class="whitespace-pre-line">{{ $ticket->description }}</p>
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ route('tickets.edit', $ticket) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit Ticket
                            </a>
                            <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="inline" 
                                  onsubmit="return confirm('Yakin ingin menghapus ticket ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Hapus Ticket
                                </button>
                            </form>
                        </div>
                    </div>

                    <hr class="my-6">

                    <h5 class="text-lg font-semibold mb-4">Balasan ({{ $ticket->replies->count() }})</h5>

                    @foreach($ticket->replies as $reply)
                    <div class="bg-gray-50 p-4 rounded-lg mb-3">
                        <div class="flex justify-between mb-2">
                            <strong>{{ $reply->user->name }}</strong>
                            <small class="text-gray-500">{{ $reply->created_at->format('d M Y H:i') }}</small>
                        </div>
                        <p class="whitespace-pre-line">{{ $reply->content }}</p>
                    </div>
                    @endforeach

                    <div class="bg-white border border-gray-200 rounded-lg mt-6">
                        <div class="p-4 border-b border-gray-200">
                            <h5 class="font-semibold">Tambah Balasan</h5>
                        </div>
                        <div class="p-4">
                            <form action="{{ route('tickets.reply', $ticket) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <textarea name="content" rows="3" 
                                              class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('content') border-red-500 @enderror" 
                                              placeholder="Tulis balasan Anda..." required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Kirim Balasan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>