<?php
// car_product
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   // Makes migration and defines relationship
        Schema::create('playlist_saved_list_songs', function (Blueprint $table) {
            $table->integer('playlist_saved_list_id')->unsigned();
            $table->integer('songs_id')->unsigned();
            $table->id();

            $table->foreign('playlist_saved_list_id')
            ->references('id')
            ->on('playlist_saved_list')
            ->onDelete('cascade');
            $table->foreign('songs_id')
            ->references('id')
            ->on('songs')
            ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlist_saved_list_songs');
    }
};
