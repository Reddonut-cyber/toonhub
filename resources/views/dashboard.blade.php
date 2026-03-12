<x-app-layout>
    <div class="min-h-screen bg-[#121212] text-gray-200 font-sans selection:bg-orange-500/30">
        
        <!-- Header -->
        <header class="bg-[#1a1a1a]/80 backdrop-blur-md border-b border-white/5 sticky top-0 z-30">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h2 class="font-bold text-2xl text-white leading-tight">
                    {{ Auth::user()->usertype === 'admin' ? 'Admin Control Center' : 'My Library' }}
                </h2>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-400 hidden sm:inline">Welcome back,</span>
                    <span class="text-sm font-bold text-orange-500">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </header>

        <main class="py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                @if(Auth::user()->usertype === 'admin')
                    {{-- ==================== ADMIN DASHBOARD ==================== --}}
                    
                    <!-- 1. Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Total Comics -->
                        <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 p-6 shadow-lg relative overflow-hidden group">
                            <div class="absolute right-0 top-0 opacity-5 group-hover:opacity-10 transition-opacity transform translate-x-1/4 -translate-y-1/4">
                                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/></svg>
                            </div>
                            <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Total Comics</p>
                            <p class="text-4xl font-black text-white mt-2">{{ $totalComics ?? 0 }}</p>
                        </div>

                        <!-- Total Users -->
                        <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 p-6 shadow-lg relative overflow-hidden group">
                            <div class="absolute right-0 top-0 opacity-5 group-hover:opacity-10 transition-opacity transform translate-x-1/4 -translate-y-1/4">
                                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                            </div>
                            <p class="text-sm font-medium text-blue-400 uppercase tracking-wider">Total Users</p>
                            <p class="text-4xl font-black text-white mt-2">{{ $totalUsers ?? 0 }}</p>
                        </div>

                        <!-- Total Categories -->
                        <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 p-6 shadow-lg relative overflow-hidden group">
                            <div class="absolute right-0 top-0 opacity-5 group-hover:opacity-10 transition-opacity transform translate-x-1/4 -translate-y-1/4">
                                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/></svg>
                            </div>
                            <p class="text-sm font-medium text-pink-400 uppercase tracking-wider">Total Categories</p>
                            <p class="text-4xl font-black text-white mt-2">{{ $totalCategories ?? 0 }}</p>
                        </div>
                    </div>

                    <!-- 2. Quick Actions & Recent Activity -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                        
                        <!-- Quick Actions -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-bold text-white">Quick Actions</h3>
                            <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 p-6 space-y-4">
                                <a href="{{ route('comics.create') }}" class="flex items-center justify-center w-full px-4 py-4 bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-500 hover:to-orange-400 text-white rounded-xl font-bold transition-all shadow-lg shadow-orange-600/20 gap-2 transform hover:-translate-y-0.5">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    Add New Comic
                                </a>
                                <a href="#" class="flex items-center justify-center w-full px-4 py-4 bg-[#252525] hover:bg-[#303030] text-gray-200 rounded-xl font-bold transition-all border border-white/5 gap-2">
                                    <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 011 12V7a4 4 0 014-4z"/></svg>
                                    Manage Categories
                                </a>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div class="lg:col-span-2 space-y-6">
                            <h3 class="text-lg font-bold text-white">Recent Activity</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Recent Comics -->
                                <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 overflow-hidden">
                                    <div class="px-5 py-3 border-b border-white/5 bg-white/5 font-bold text-xs uppercase tracking-widest text-gray-400">Latest Comics</div>
                                    @foreach($latestComics ?? [] as $comic)
                                        <div class="flex items-center gap-3 p-3 border-b border-white/5 last:border-0">
                                            <div class="w-10 h-10 rounded bg-gray-800 flex-shrink-0 overflow-hidden">
                                                @if($comic->image) <img src="{{ asset('storage/' . $comic->image) }}" class="w-full h-full object-cover"> @endif
                                            </div>
                                            <div class="min-w-0">
                                                <div class="text-sm font-bold text-white truncate">{{ $comic->name }}</div>
                                                <div class="text-[10px] text-gray-500">{{ $comic->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Recent Users -->
                                <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 overflow-hidden">
                                    <div class="px-5 py-3 border-b border-white/5 bg-white/5 font-bold text-xs uppercase tracking-widest text-gray-400">New Members</div>
                                    @foreach($latestUsers ?? [] as $user)
                                        <div class="flex items-center gap-3 p-3 border-b border-white/5 last:border-0">
                                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gray-700 to-gray-800 flex items-center justify-center text-xs font-bold text-white">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <div class="min-w-0">
                                                <div class="text-sm font-bold text-white truncate">{{ $user->name }}</div>
                                                <div class="text-[10px] text-gray-500">Joined {{ $user->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Management Table -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-white">Manage Comics</h3>
                            <a href="{{ route('comics.index') }}" class="text-xs text-orange-500 font-bold uppercase hover:underline">View Full List</a>
                        </div>
                        <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 overflow-hidden overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-white/5 text-gray-400 text-xs uppercase font-bold">
                                    <tr>
                                        <th class="px-6 py-4">Title</th>
                                        <th class="px-6 py-4">Status</th>
                                        <th class="px-6 py-4">Created</th>
                                        <th class="px-6 py-4 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5">
                                    @foreach($comics ?? [] as $comic)
                                    <tr class="hover:bg-white/5 transition-colors">
                                        <td class="px-6 py-4 font-medium text-white">{{ $comic->name }}</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 text-[10px] rounded bg-white/10 text-gray-300 font-bold uppercase">{{ $comic->status }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $comic->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 text-right space-x-2">
                                            <a href="{{ route('comics.edit', $comic) }}" class="text-blue-500 hover:text-blue-400 text-xs font-bold uppercase">Edit</a>
                                            <button form="delete-form-{{$comic->id}}" class="text-red-500 hover:text-red-400 text-xs font-bold uppercase">Delete</button>
                                            <form id="delete-form-{{$comic->id}}" action="{{ route('comics.destroy', $comic) }}" method="POST" class="hidden">@csrf @method('DELETE')</form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                @else
                    {{-- ==================== USER DASHBOARD ==================== --}}

                    <!-- 1. Continue Reading Hero -->
                    <div class="mb-10">
                        <h3 class="text-lg font-bold text-white mb-4">Continue Reading</h3>
                        @if(isset($lastReadComic))
                            <div class="bg-gradient-to-r from-orange-900/40 to-[#1a1a1a] rounded-2xl border border-orange-500/20 p-6 flex items-center gap-6 relative overflow-hidden group cursor-pointer hover:border-orange-500/40 transition-all">
                                <div class="absolute inset-0 bg-orange-500/5 group-hover:bg-orange-500/10 transition-colors"></div>
                                <div class="w-24 h-36 bg-gray-800 rounded-lg shadow-2xl z-10 overflow-hidden flex-shrink-0">
                                    @if($lastReadComic->image) <img src="{{ asset('storage/' . $lastReadComic->image) }}" class="w-full h-full object-cover"> @endif
                                </div>
                                <div class="z-10">
                                    <div class="text-orange-500 text-xs font-bold uppercase tracking-widest mb-1">Last Read</div>
                                    <h2 class="text-3xl font-black text-white mb-2">{{ $lastReadComic->name }}</h2>
                                    <p class="text-gray-400 text-sm mb-4 line-clamp-2">{{ $lastReadComic->description }}</p>
                                    <button class="bg-white text-black px-6 py-2 rounded-full font-bold text-sm hover:bg-gray-200 transition-colors">Read Now</button>
                                </div>
                            </div>
                        @else
                            <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 p-10 text-center">
                                <p class="text-gray-500">You haven't read any comics yet.</p>
                                <a href="{{ route('comics.index') }}" class="text-orange-500 font-bold hover:underline mt-2 inline-block">Explore Library</a>
                            </div>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                        <!-- 2. My Favorites -->
                        <div class="lg:col-span-2">
                            <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                My Favorites
                            </h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                @forelse($favorites ?? [] as $comic)
                                    <a href="{{ route('comics.show', $comic) }}" class="group block relative aspect-[2/3] rounded-xl overflow-hidden bg-gray-800">
                                        @if($comic->image)
                                            <img src="{{ asset('storage/' . $comic->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @endif
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex flex-col justify-end p-3">
                                            <span class="text-white font-bold text-sm line-clamp-1">{{ $comic->name }}</span>
                                        </div>
                                    </a>
                                @empty
                                    <div class="col-span-full py-10 text-center text-gray-500 text-sm bg-[#1a1a1a] rounded-xl border border-white/5">
                                        No favorites added yet.
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <!-- 3. Reading History -->
                        <div>
                            <h3 class="text-lg font-bold text-white mb-4">History</h3>
                            <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 overflow-hidden">
                                @forelse($readingHistory ?? [] as $comic)
                                    <a href="{{ route('comics.show', $comic) }}" class="flex items-center gap-3 p-3 border-b border-white/5 hover:bg-white/5 transition-colors group">
                                        <div class="w-12 h-16 rounded bg-gray-800 flex-shrink-0 overflow-hidden">
                                            @if($comic->image) <img src="{{ asset('storage/' . $comic->image) }}" class="w-full h-full object-cover"> @endif
                                        </div>
                                        <div class="min-w-0">
                                            <div class="text-sm font-bold text-gray-300 group-hover:text-white truncate">{{ $comic->name }}</div>
                                            <div class="text-[10px] text-gray-500">Read 2 hours ago</div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="p-6 text-center text-gray-500 text-xs">No history available.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                @endif

            </div>
        </main>
    </div>
</x-app-layout>