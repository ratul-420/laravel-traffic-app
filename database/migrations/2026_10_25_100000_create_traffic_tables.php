<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('naming', function (Blueprint $t) {
            $t->id();
            $t->string('nev');
        });
        Schema::create('extent', function (Blueprint $t) {
            $t->id();
            $t->string('nev');
        });
        Schema::create('restriction', function (Blueprint $t) {
            $t->id();
            $t->integer('roadnumber');
            $t->decimal('frompoint', 9, 3);
            $t->decimal('topoint', 9, 3);
            $t->string('settlement');
            $t->date('fromdate');
            $t->date('todate');
            $t->foreignId('namingid')->constrained('naming');
            $t->foreignId('extentid')->constrained('extent');
            $t->integer('speed')->nullable();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('restriction');
        Schema::dropIfExists('extent');
        Schema::dropIfExists('naming');
    }
};
