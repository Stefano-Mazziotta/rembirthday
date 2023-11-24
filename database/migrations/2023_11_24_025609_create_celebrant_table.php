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
        Schema::create('celebrants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('surname', 30);
            $table->string('email', 30);
            $table->date('birthday');
            $table->bigInteger('phone')->nullable();
            
            $table->unsignedBigInteger('relationship_id');
            $table->foreign('relationship_id')->references('id')->on('relationships')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('celebrants');
    }
};
