<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_assignments', function (Blueprint $table) {
            $table->id();
            $table->integer('asset_id')->nullable();
            $table->date('assignment_date')->nullable();
            $table->string('status')->nullable();
            $table->boolean('is_due')->nullable();
            $table->date('due_date')->nullable();
            $table->integer('assigned_user_id')->nullable();
            $table->string('assigned_by')->nullable();
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
        Schema::dropIfExists('asset_assignments');
    }
}
