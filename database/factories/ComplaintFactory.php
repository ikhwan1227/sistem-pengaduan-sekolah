<?php

namespace Database\Factories;

use App\Models\Complaint;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComplaintFactory extends Factory
{
    protected $model = Complaint::class;

    public function definition(): array
    {
        return [
            'user_id' => User::where('role', 'siswa')->inRandomOrder()->first()->id ?? 1,
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'judul' => $this->faker->sentence(4),
            'deskripsi' => $this->faker->paragraph(3),
            'status' => $this->faker->randomElement(['pending', 'diproses', 'selesai']),
            'tanggal' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}