<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            $table->string('organization_name', 100)->nullable()->index();
            $table->string('slug', 150)->nullable()->index();
            $table->string('province', 50)->nullable()->index();
            $table->string('district', 50)->nullable();
            $table->string('municipality', 50)->nullable();
            $table->string('ward_no', 10)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('website', 50)->nullable();
            $table->string('facebook', 180)->nullable();
            $table->string('twitter', 180)->nullable();
            $table->string('instagram', 180)->nullable();
            $table->text('description')->nullable();
            $table->string('logo', 150)->nullable();
            $table->enum('status', ['unverified','pending','verified','banned','declined'])->default('unverified')->index();
            $table->unsignedBigInteger('industry_id')->nullable();
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade')->onUpdate('cascade');
            
            $table->enum('is_setup_profile',[0,1])->default(0)->index(); // 0 for the not setup
            $table->enum('is_active',[0,1])->default(1)->index(); // 0 for the inactive users
            $table->enum('is_enabled',[0,1])->default(1)->index(); // 0 for the disabled users
            $table->dateTime('last_login_time')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
}
