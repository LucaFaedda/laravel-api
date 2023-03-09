<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * serve per creare una colonna nuova in projects e collegarla a type tramite foreign key
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Qua creiamo la colonna
            $table ->unsignedBigInteger('types_id')
                ->nullable()
                ->after('id'); // NON obbligatorio
            
            // Qua creiamo la foreign key
            $table->foreign('types_id') // deve coincidere con il nome di riga 19
                ->references('id') // nome colonna a cui fa riferimento
                ->on('types') // fa riferimento alla tabella a cui appartiene
                ->onDelete('set null'); // qua diciamo di settare a null la colonna nel caso in cui cancellassimo il type
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_types_id_foreign'); // al centro ci va la nome della foreign key e serve per cancellare il vincolo applicato dalla chiave esterna
            $table->dropColumn('types_id'); // si droppa la colonna
        });
    }
};
