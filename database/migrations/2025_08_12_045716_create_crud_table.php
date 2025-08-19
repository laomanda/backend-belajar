<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('crud', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->string('radio_group');
            $table->string('checkbox');
            $table->string('select_field'); // langsung string
            $table->date('date');
            $table->string('file');
            $table->text('textarea');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crud');
    }
};
