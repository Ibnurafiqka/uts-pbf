<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->date('borrow_date')->default(DB::raw('CURRENT_DATE'));
            $table->date('return_date'); // tanggal yang seharusnya dikembalikan
            $table->date('actual_return_date')->nullable(); // tanggal dikembalikan sebenarnya
            $table->boolean('returned')->default(false); // true jika sudah dikembalikan
            $table->integer('fine')->default(0); // denda, dalam satuan rupiah atau sesuai kebutuhan
            $table->text('notes')->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
