<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_peminjamen', function (Blueprint $table) {
            $table->id('id_details_borrow');
            $table->unsignedBigInteger('id_items'); // Ensure this is unsignedBigInteger
            $table->integer('amount');
            $table->string('used_for');
            $table->string('class');
            $table->dateTime('date_borrowed');
            $table->dateTime('due_date');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_items')
                ->references('id_items')
                ->on('barangs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_peminjamen');
    }
};
