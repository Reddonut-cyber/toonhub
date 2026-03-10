<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToonHub - สังคมคนรักการ์ตูน</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Kanit', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-4xl w-full bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
        
        <div class="md:w-1/2 bg-gradient-to-br from-orange-500 to-red-600 p-10 text-white flex flex-col justify-center">
            <h1 class="text-5xl font-black mb-4">ToonHub</h1>
            <p class="text-lg opacity-90 mb-6">คอมมูนิตี้คนรักการ์ตูนที่ใหญ่ที่สุด อ่านเรื่องย่อ ติดตามสถานะ และบันทึกเรื่องโปรดของคุณ</p>
            <div class="flex gap-2">
                <span class="text-xs font-bold bg-white/20 py-1 px-3 rounded-full border border-white/30 text-white">#Manga</span>
                <span class="text-xs font-bold bg-white/20 py-1 px-3 rounded-full border border-white/30 text-white">#Manhwa</span>
                <span class="text-xs font-bold bg-white/20 py-1 px-3 rounded-full border border-white/30 text-white">#Anime</span>
            </div>
        </div>

        <div class="md:w-1/2 p-12 flex flex-col justify-center bg-gray-50">
            @if (Route::has('login'))
                <div class="space-y-6">
                    @auth
                        <div class="text-center">
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">ยินดีต้อนรับกลับ!</h2>
                            <p class="text-gray-600 mb-8">{{ Auth::user()->name }}</p>
                            <a href="{{ url('/dashboard') }}" 
                                class="inline-block w-full py-4 px-6 bg-orange-500 hover:bg-orange-600 text-white font-bold text-center rounded-xl transition duration-300 transform hover:-translate-y-1 shadow-lg">
                                เข้าสู่ Dashboard
                            </a>
                        </div>
                    @else
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-gray-800">พร้อมหรือยัง?</h2>
                            <p class="text-gray-500 mt-2">เข้าสู่ระบบเพื่อจัดการคลังการ์ตูนของคุณ</p>
                        </div>

                        <div class="flex flex-col gap-4">
                            <a href="{{ route('login') }}" 
                                class="w-full py-4 px-6 bg-orange-500 hover:bg-orange-600 text-white font-bold text-center rounded-xl transition duration-300 transform hover:-translate-y-1 shadow-lg">
                                เข้าสู่ระบบ
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" 
                                    class="w-full py-4 px-6 bg-white border-2 border-orange-500 text-orange-500 font-bold text-center rounded-xl transition duration-300 hover:bg-orange-50">
                                    สมัครสมาชิกใหม่
                                </a>
                            @endif
                        </div>

                        <div class="mt-10 pt-6 border-t border-gray-200 text-center">
                            <a href="{{ route('comics.index') }}" class="text-sm text-gray-500 hover:text-orange-500 transition">
                                ดูรายชื่อการ์ตูนทั้งหมด (Guest Mode)
                            </a>
                        </div>
                    @endauth
                </div>
            @endif
        </div>

    </div>

</body>
</html>