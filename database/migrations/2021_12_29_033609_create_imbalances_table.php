<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImbalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imbalances', function (Blueprint $table) {
            $table->id();
            $table->string('bug_name');
            $table->string('Bug_tool');
            $table->string('causes_name');
            $table->text('bug_desc');
            $table->integer('views')->default(0);
            $table->enum('status',['good','Under_review','Previewed','Closed']);
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->foreignId('fault_side_id')->constrained('fault_sides');
            $table->foreignId('causes_glitch_id')->constrained('causes_glitches');
            $table->foreignId('user_id')->constrained('users');






            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imbalances');
    }
}
