<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('claim_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lost_item_id')->constrained()->onDelete('cascade');
            $table->foreignId('reporter_id')->constrained()->onDelete('cascade');
            $table->string('claimant_name');
            $table->string('claimant_email');
            $table->string('claimant_phone');
            $table->date('reported_date');
            $table->date('claimed_date')->nullable();
            $table->enum('status', ['reported', 'claimed', 'collected'])->default('reported');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('claim_records');
    }
};
?>
