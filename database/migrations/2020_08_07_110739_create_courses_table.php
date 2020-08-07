<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->default('<div style="font-size:22px;color:#777777;"><span>For actively participating in</span><br>
            <span><b>Teacher Webinar</b> Conducted by</span>
            <br><span>Mr. Sandip Mitra representing e-Edport</span></div>');
            $table->string('aname')->default('Mr. Sandip Mitra');
            $table->string('arole')->default('Business consultant and advisor');
            $table->string('asignature')->default('image/signature.png');
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
        Schema::dropIfExists('courses');
    }
}
