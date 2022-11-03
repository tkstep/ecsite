<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameAdminToAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
Schema::rename('admin', 'admins');    
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

Schema::rename('admins', 'admin');    
    }
}
