<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiariesContentsTable extends Migration
{
   
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaries_contents', function (Blueprint $table) {
            $table->id('diarycontent_id');
            $table->string('diarycontent_weekday',255);
            $table->text('diarycontent_work');
            $table->text('diarycontent_content');           
            $table->text('diarycontent_note');
            $table->integer('weeks_id');
            $table->integer('status');
            $table->timestamp('deleted_at')->nullable();           
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diaries_contents');
    }
}
