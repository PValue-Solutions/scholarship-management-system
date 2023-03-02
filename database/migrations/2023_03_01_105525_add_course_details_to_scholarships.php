<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourseDetailsToScholarships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->string('course')->after('payment_date');
            $table->string('combination')->after('course');
            $table->string('total_marks')->after('combination');
            $table->string('obtained_marks')->after('total_marks');
            $table->string('percentage')->after('obtained_marks');
            $table->string('previously_scholarship')->after('percentage');
            $table->string('how_many_years')->after('previously_scholarship')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->dropColumn('course');
            $table->dropColumn('combination');
            $table->dropColumn('total_marks');
            $table->dropColumn('obtained_marks');
            $table->dropColumn('percentage');
            $table->dropColumn('previously_scholarship');
            $table->dropColumn('how_many_years');
        });
    }
}
