<?php

use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('slug');
            $table->text('description');
            $table->unsignedSmallInteger('quantity');
            $table->float('rate');
            $table->year('publish_year');
            $table->float('price');
            $table->boolean('is_avilable')->default(1);
            $table->foreignIdFor(Category::class)->nullable()->constrained()->lete();
            $table->foreignIdFor(Publisher::class)->nullable()->constrained()->lete();
            $table->foreignIdFor(Author::class)->nullable()->constrained()->lete();
            $table->nullableMorphs('discountable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
