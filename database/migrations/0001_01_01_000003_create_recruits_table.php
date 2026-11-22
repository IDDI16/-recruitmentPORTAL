<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        

         Schema::create('recruits', function (Blueprint $table) {
        $table->id('ID');
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamps();

// ADDED 
         $table->rememberToken();
       // $table->string('deleted_at');
        $table->softDeletes();
         $table->timestamp('email_verified_at')->nullable();
        //$table->enum ('role' , ['USER','ADMIN','SUPER_ADMIN']);
         $table->string('role', 50); // Allows up to 50 characters
          $table->string('phone');
           $table->string('password');
    //   $table->decimal('price', 10, 2);
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      

// ADDED
       
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('recruits');
       
    }
};
