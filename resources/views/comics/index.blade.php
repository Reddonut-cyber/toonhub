<x-app-layout>
    <div class="min-h-screen bg-[#121212] text-gray-200 font-sans selection:bg-orange-500/30">
        
        @if (session('success'))
            <div x-data="{ show: true }" 
                 x-show="show" 
                 x-init="setTimeout(() => show = false, 5000)"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-[-20px]"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-500"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed top-24 right-6 z-[100]">
                <div class="bg-green-500 text-white px-6 py-3 rounded-2xl shadow-2xl shadow-green-500/20 flex items-center gap-3 border border-green-400/20 backdrop-blur-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="font-bold text-sm">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <header class="sticky top-0 z-40 w-full backdrop-blur-xl bg-[#121212]/80 border-b border-white/5">
            <div class="max-w-[1600px] mx-auto px-4 py-4">
                <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
                    
                    <div class="relative w-full lg:max-w-md group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500 group-focus-within:text-orange-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text" name="search" placeholder="ค้นหาเรื่องที่ต้องการ..." 
                               class="block w-full pl-11 pr-4 py-2.5 bg-white/5 border border-white/10 rounded-full focus:ring-2 focus:ring-orange-500 focus:border-transparent text-sm transition-all placeholder-gray-600 outline-none">
                    </div>

                    <div class="flex items-center gap-3 w-full lg:w-auto">
                        <select name="status" class="bg-white/5 border-white/10 rounded-xl text-xs font-bold text-gray-400 focus:ring-orange-500 focus:border-orange-500 cursor-pointer py-2 pl-3 pr-8 w-1/2 lg:w-40">
                            <option value="">ทุกสถานะ</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Completed">Completed</option>
                        </select>
                        <select name="category" class="bg-white/5 border-white/10 rounded-xl text-xs font-bold text-gray-400 focus:ring-orange-500 focus:border-orange-500 cursor-pointer py-2 pl-3 pr-8 w-1/2 lg:w-48">
                            <option value="">ทุกหมวดหมู่</option>
                            @foreach($categories ?? [] as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </header>

        <main class="max-w-[1600px] mx-auto px-4 py-10">
            
            @if($comics->isEmpty())
                <div class="flex flex-col items-center justify-center py-40 opacity-40">
                    <svg class="w-24 h-24 mb-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    <p class="text-2xl font-black italic uppercase tracking-widest">No Comics Found</p>
                    <p class="text-sm mt-2">ไม่พบข้อมูลการ์ตูนในขณะนี้</p>
                </div>
            @else
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-8 gap-x-4 gap-y-10">
                    
                    @foreach ($comics as $comic)
                        <article class="group relative">
                            <a href="{{ route('comics.show', $comic) }}" class="block">
                                <div class="relative aspect-[3/4] rounded-2xl overflow-hidden bg-[#1a1a1a] border border-white/5 transition-all duration-500 group-hover:-translate-y-2 group-hover:ring-2 group-hover:ring-orange-500 group-hover:shadow-[0_0_30px_rgba(249,115,22,0.3)]">
                                    
                                    @if($comic->image)
                                        <img src="{{ asset('storage/' . $comic->image) }}" 
                                             alt="{{ $comic->name }}" 
                                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    @else
                                        <div class="absolute inset-0 flex flex-col items-center justify-center bg-gradient-to-br from-neutral-800 to-neutral-900 text-white/10">
                                            <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="1.5"/></svg>
                                            <span class="text-[10px] uppercase font-black tracking-tighter">No Preview</span>
                                        </div>
                                    @endif

                                    <div class="absolute top-3 left-3 z-10">
                                        <span class="backdrop-blur-md bg-black/40 border border-white/10 text-white text-[9px] font-black px-2.5 py-1 rounded-lg uppercase tracking-wider">
                                            {{ $comic->status }}
                                        </span>
                                    </div>

                                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-60"></div>
                                </div>

                                <div class="mt-4 px-1">
                                    <h3 class="text-sm font-bold text-gray-100 line-clamp-1 group-hover:text-orange-500 transition-colors leading-tight">
                                        {{ $comic->name }}
                                    </h3>
                                    <div class="flex gap-2 mt-1.5 opacity-60">
                                        @foreach($comic->categories->take(2) as $category)
                                            <span class="text-[9px] font-bold uppercase tracking-widest">#{{ $category->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach

                </div>
            @endif

        </main>
    </div>
</div>
</x-app-layout>