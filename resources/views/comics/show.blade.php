<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] text-gray-200 font-sans pb-20">
        
        <div class="relative h-[60vh] w-full overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center scale-110 blur-3xl opacity-30" 
                 style="background-image: url('{{ asset('storage/' . $comic->image) }}')"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-[#0a0a0a]/60 to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 -mt-[40vh] relative z-10">
            <div class="flex flex-col lg:flex-row gap-12">
                
                <div class="w-full lg:w-1/3 flex-shrink-0">
                    <div class="sticky top-28">
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $comic->image) }}" 
                                 class="w-full aspect-[3/4] object-cover rounded-[2.5rem] shadow-[0_0_50px_rgba(0,0,0,0.5)] border border-white/10 transition-transform duration-500 group-hover:scale-[1.02]">
                            
                            <div class="absolute top-4 left-4">
                                <span class="backdrop-blur-xl bg-orange-500/80 text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest shadow-lg">
                                    {{ $comic->status }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-8 space-y-4">
                            <a href="{{ $comic->comic_web }}" target="_blank" 
                               class="flex items-center justify-center w-full py-4 bg-orange-500 hover:bg-orange-600 text-white font-black rounded-2xl transition-all shadow-xl shadow-orange-500/20 group">
                                <span>เริ่มอ่านตอนแรก</span>
                                <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </a>

                            <div class="flex gap-2" x-data="{ isFavorite: false }">
                                <button 
                                    @click="isFavorite = !isFavorite"
                                    :class="isFavorite ? 'bg-orange-500 border-orange-500 text-white' : 'bg-white/5 border-white/10 text-gray-400 hover:text-orange-500'"
                                    class="flex-1 flex items-center justify-center gap-2 py-4 rounded-2xl transition-all duration-300 border font-bold group"
                                >
                                    <svg 
                                        class="w-6 h-6 transition-transform duration-300 group-hover:scale-110" 
                                        :fill="isFavorite ? 'currentColor' : 'none'" 
                                        stroke="currentColor" 
                                        viewBox="0 0 24 24"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    
                                    <span x-text="isFavorite ? 'บันทึกแล้ว' : 'เพิ่มในรายการโปรด'"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-2/3 space-y-12">
                    <div class="space-y-4">
                        <div class="flex flex-wrap gap-2">
                            @foreach($comic->categories as $category)
                                <span class="bg-orange-500/10 text-orange-500 border border-orange-500/20 px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </div>
                        <h1 class="text-5xl md:text-7xl font-black text-white leading-[0.9] tracking-tighter uppercase">
                            {{ $comic->name }}
                        </h1>
                        <p class="text-lg text-gray-400 leading-relaxed max-w-2xl">
                            {{ $comic->summary }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>