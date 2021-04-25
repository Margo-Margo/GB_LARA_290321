<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->string('title', '50')
                ->unique()
                ->nullable(false);
            $table->string('source', 100)
                ->nullable(true);
            $table->char('user', 15)
                ->nullable(false);
            $table->dateTime('publish_date')
                ->nullable(true)
                ->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->bigInteger('source')
                ->unsigned()
                ->index();
            $table->foreign('source')
                ->references('id')
                ->on('sources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('news', ['source']);
        Schema::dropIfExists('sources');

    }
}
