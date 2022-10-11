<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("birth_date");
            $table->enum("gender", ["male", "female"]);
            $table->string("avatar");
            $table->string("email")->unique();
            $table->string("password");
            $table->boolean("is_verified")->default(0);
            $table->unsignedBigInteger("role_id");
            $table->string("verification_code")->default(null);
            $table->timestamps();
            $table->foreign("role_id")
                ->references("id")->on("roles");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
