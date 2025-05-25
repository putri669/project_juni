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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id('id_borrowed'); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_details_borrow'); // Ensure this matches the type in `details_borrows`
            $table->enum('status', ['approved', 'not approved', 'pending'])->default('pending');
            $table->tinyInteger('soft_delete')->default(0);
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('id_details_borrow')
                ->references('id_details_borrow')
                ->on('detail_peminjamen')
                ->onDelete('cascade');

            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
