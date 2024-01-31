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
        Schema::create('descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text');

            // Nullable foreign key for product_id
            $table->foreignId('product_id')->nullable()->constrained('products');

            // Nullable foreign key for factory_id
            $table->foreignId('factory_id')->nullable()->constrained('factories');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descriptions');
    }
};
