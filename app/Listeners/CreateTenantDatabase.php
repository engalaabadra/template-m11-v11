<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\TenantCreated;

class CreateTenantDatabase
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TenantCreated $event): void
    {
        $tenant = $event->tenant;
        $db = "tenant_{$tenant->id}";
        $tenant->data = [
            'db_name' => $db
        ];
        $tenant->save();
        DB::statement("CREATE DATABASE `{$db}`");
        //use new name database -> tenant in connections array in database.php
        Config::set('database.connections.tenant.database', $db);//change name db from the old into the new

        //to get right path
        $dir = new DirectoryIterator(database_path('migrations/tenants'));
        foreach ($dir as $file) {
        if ($file->isFile()) {
            Artisan::call('migrate',[
                '--path' => 'database/migrations/tenants' . $file->getFilename(),
                '--force' => true
            ]);
        }
        //restore after creation tenant
        Config::set('database.connections.mysql.database', $old);//change name db from the old into the new

    }       
    }
}
