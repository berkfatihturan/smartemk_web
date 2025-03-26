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
        Schema::create('messages', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name',50);
            $table->string('email',50)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('subject',100)->nullable();
            $table->string('message')->nullable();
            $table->string('note',100)->nullable();
            $table->string('ip',50)->nullable();
            $table->string('status',)->nullable()->default('New');
            $table->timestamps();
        });

        DB::statement("
            CREATE TRIGGER insert_messages AFTER INSERT ON messages
            FOR EACH ROW
            BEGIN
                INSERT INTO logs (table_name, table_id, action) VALUES ('messages', NEW.id, 'INSERT');
            END;
        ");

        DB::statement("
            CREATE TRIGGER update_messages AFTER UPDATE ON messages
            FOR EACH ROW
            BEGIN
                INSERT INTO logs (table_name, table_id, action) VALUES ('messages', NEW.id, 'UPDATE');
            END;
        ");

        DB::statement("
            CREATE TRIGGER delete_messages BEFORE DELETE ON messages
            FOR EACH ROW
            BEGIN
                INSERT INTO logs (table_name, table_id, action) VALUES ('messages', OLD.id, 'DELETE');
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
