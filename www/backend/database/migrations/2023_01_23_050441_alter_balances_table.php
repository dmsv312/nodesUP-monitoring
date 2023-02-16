<?php

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
        Schema::table('balances', function (Blueprint $table) {
            $table->dateTime('blocking_date')->nullable()->after('amount');
        });
        Schema::table('balances', function (Blueprint $table) {
            $table->decimal('recommended_payment_amount', 9, 2)->nullable()->after('blocking_date');
        });
        Schema::table('balances', function (Blueprint $table) {
            $table->decimal('minimum_payment_amount', 9 , 2)->nullable()->after('recommended_payment_amount');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('balances', function (Blueprint $table) {
            $table->dropColumn('blocking_date');
        });
        Schema::table('balances', function (Blueprint $table) {
            $table->dropColumn('recommended_payment_amount');
        });
        Schema::table('balances', function (Blueprint $table) {
            $table->dropColumn('minimum_payment_amount');
        });
    }
};
