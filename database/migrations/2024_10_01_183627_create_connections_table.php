<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coach_id')->constrained('users')->onDelete('cascade'); // Referencing users
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade'); // Referencing users
            $table->string('message')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->foreignId('initiated_by')->constrained('users')->onDelete('cascade'); // Who initiated the request
            $table->timestamps();

            $table->unique(['coach_id', 'client_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('connections');
    }
};
