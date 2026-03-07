<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToonHub - Welcome & Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Kanit', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-4xl w-full bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
        
        <div class="md:w-1/2 bg-orange-500 p-10 text-white flex flex-col justify-center">
            <h1 class="text-4xl font-bold mb-4">ToonHub</h1>
            <p class="text-lg opacity-90 mb-6">ยินดีต้อนรับสู่คอมมูนิตี้คนรักการ์ตูน อ่านเรื่องย่อ ติดตามสถานะ และจัดอันดับเรื่องโปรดของคุณได้ที่นี่</p>
            <div class="hidden md:block">
                <span class="text-sm bg-orange-600 py-1 px-3 rounded-full">#Manga</span>
                <span class="text-sm bg-orange-600 py-1 px-3 rounded-full">#Manhwa</span>
            </div>
        </div>

        <div class="md:w-1/2 p-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">เข้าสู่ระบบ</h2>
            
            <form action="/login" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" required 
                        class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 text-gray-900">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" required 
                        class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 text-gray-900">
                </div>

                <button type="submit" 
                    class="w-full py-3 px-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg transition duration-200 shadow-lg">
                    Login to ToonHub
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600">ยังไม่มีบัญชีใช่ไหม? <a href="/register" class="text-orange-500 font-bold hover:underline">สมัครสมาชิก</a></p>
            </div>
        </div>

    </div>

</body>
</html>