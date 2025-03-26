<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();

                $table->string('company_name', 150)->default("NULL")->nullable();
                $table->string('address', 400)->default("NULL")->nullable();
                $table->string('logo', 256)->default("NULL")->nullable();
                $table->string('icon', 256)->default("NULL")->nullable();

                $table->string('phone', 20)->default("NULL")->nullable();
                $table->string('email', 75)->default("NULL")->nullable();
                $table->string('facebook_url', 100)->nullable();
                $table->string('twitter_url', 100)->nullable();
                $table->string('youtube_url', 100)->nullable();
                $table->string('linkedin_url', 100)->nullable();
                $table->string('url', 100)->default("NULL")->nullable();
                $table->text('map_link')->default("NULL")->nullable();

                $table->string('api_server_address', 100)->default("NULL")->nullable();
                $table->integer('api_server_port')->default(0)->nullable();

                $table->string('mail_address', 255)->default("NULL")->nullable();
                $table->string('mail_app_key', 255)->default("NULL")->nullable();

                $table->string('main_server_address', 255)->default("NULL")->nullable();
                $table->string('service_id')->default(0)->nullable();
                $table->integer('serverPermission')->default(0)->nullable();

                $table->timestamps();
            });

            DB::statement("
            CREATE TRIGGER insert_settings AFTER INSERT ON settings
            FOR EACH ROW
            BEGIN
                INSERT INTO logs (table_name, table_id, action) VALUES ('settings', NEW.id, 'INSERT');
            END;
            ");

            DB::statement("
            CREATE TRIGGER update_settings AFTER UPDATE ON settings
            FOR EACH ROW
            BEGIN
                INSERT INTO logs (table_name, table_id, action) VALUES ('settings', NEW.id, 'UPDATE');
            END;
            ");

            DB::statement("
            CREATE TRIGGER delete_settings BEFORE DELETE ON settings
            FOR EACH ROW
            BEGIN
                INSERT INTO logs (table_name, table_id, action) VALUES ('settings', OLD.id, 'DELETE');
            END;
            ");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
