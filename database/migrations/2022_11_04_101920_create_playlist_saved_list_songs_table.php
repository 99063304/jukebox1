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
    {
        Schema::create('playlist_saved_list_songs', function (Blueprint $table) {
            $table->integer('playlist_saved_list_id')->unsigned();
            $table->integer('song_id')->unsigned();
            $table->foreign('playlist_saved_list_id')
            ->references('id')
            ->on('playlist_saved_list')
            ->onDelete('cascade');
            $table->foreign('song_id')
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
        Schema::dropIfExists('saved_list_songs');
    }
};
