<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ใช้ updateOrCreate เพื่อป้องกันการสร้าง User ซ้ำถ้ารัน Seeder หลายรอบ
        User::updateOrCreate(
            ['email' => 'admin@toonhub.com'], // ตรวจสอบจาก email
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), // กำหนดรหัสผ่านที่ต้องการ (เช่น 'password')
                'usertype' => 'admin', // กำหนดสิทธิ์เป็น admin
            ]
        );
    }
}