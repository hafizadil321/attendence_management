<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->after('image')->nullable();
            $table->string('address')->after('phone')->nullable();
            $table->string('cnic')->after('address')->nullable();
            $table->string('bank_account')->after('cnic')->nullable();
            $table->timestamp('joining_date')->after('bank_account')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('cnic');
            $table->dropColumn('bank_account');
            $table->dropColumn('joining_date');
        });
    }
}
