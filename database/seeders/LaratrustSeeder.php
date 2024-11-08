<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Modules\Profile\Entities\Profile;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateLaratrustTables();

        $config = Config::get('laratrust_seeder.roles_structure');

        if ($config === null) {
            $this->command->error("The configuration has not been published. Did you run `php artisan vendor:publish --tag=\"laratrust-seeder\"`");
            $this->command->line('');
            return false;
        }

        $mapPermission = collect(config('laratrust_seeder.permissions_map'));

        foreach ($config as $key => $modules) {//$config->this is from file laratrust_seeder in config foler in role_structure -> this arr contains on all roles 

            // Create a new role
            $role = Role::create([
                'name' => $key,//name is role 
                'display_name' => ucwords(str_replace('_', ' ', $key)),//like super_admin will be in db : Super Admin
                'description' => ucwords(str_replace('_', ' ', $key))
            ]);
            $permissions = [];//create_user,read_user,update_user,delete_user

            $this->command->info('Creating Role '. strtoupper($key));
            // Reading role permission modules
            foreach ($modules as $module => $value) {

                foreach (explode(',', $value) as $perm) {

                    $permissionValue = $mapPermission->get($perm);
                    $permissionName = $module . '_' . $permissionValue;
                   // Check if permission already exists
                    $existingPermission = Permission::where('name', $permissionName)->first();

                    if (!$existingPermission) {
                        $permissions[] = Permission::create([
                            'name' => $permissionName,//to became like this : create_user,read_user,update_user,delete_user
                            'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                            'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        ])->id;

                        $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);
                        }else{
                            $permissions[] = $existingPermission->id;
                            $this->command->info("Permission {$permissionName} already exists.");
                        }
                    }
            }
            
            // Attach all permissions to the role **** to put these per:create_user,read_user,update_user,delete_user into this role like super_admin
            $role->permissions()->sync($permissions);
            
            
        }
        if (Config::get('laratrust_seeder.create_users')) {
            $this->command->info("Creating '{superadmin}'");
            // Create default user for each role
            $superadmin= User::create([
                'country_id'=>63,
                'phone_no' => '1112115401',                    
                'email' => 'superadmin'.'@gmail'.'.com',
                'password' => 'password',
            ]);
            $rolesuperadmin=Role::where(['name'=>'superadmin'])->first();
            if ($rolesuperadmin) {
                $superadmin->assignRole($rolesuperadmin);
            } else {
                // Optionally log or handle the case where the role is not found
            }
            // if($superadmin) $superadmin->assignRole($rolesuperadmin);

            $this->command->info("Creating '{admin}'");
            // Create default user for each role
            $admin = User::create([
                'country_id'=>63,
                'phone_no' => '1112115402',                    
                'email' => 'admin'.'@gmail'.'.com',
                'password' => 'password',
            ]);
            $roleadmin=Role::where(['name'=>'admin'])->first();
            $admin->assignRole($roleadmin);

            //users
            $this->command->info("Creating '{alaa}'");
            // Create default user for each role
            $user1 = User::create([
                'country_id'=>63,
                'phone_no' => '1112115403',                    
                'email' => 'alaa'.'@gmail'.'.com',
                'password' => 'password',
            ]);
            $roleuser1=Role::where(['name'=>'user'])->first();
            $user1->assignRole($roleuser1);


            $this->command->info("Creating '{Mahmod}'");
            // Create default user for each role
            $user2 = User::create([
                'country_id'=>63,
                'phone_no' => '1112115404',                    
                'email' => 'Mahmod'.'@gmail'.'.com',
                'password' => 'password',
            ]);
            $roleuser2=Role::where(['name'=>'user'])->first();
            $user2->assignRole($roleuser2);

            $this->command->info("Creating '{ali}'");
            // Create default user for each role
            $user3 = User::create([
                'country_id'=>63,
                'phone_no' => '1112115405',                    
                'email' => 'ali'.'@gmail'.'.com',
                'password' => 'password',
            ]);
            $roleuser3=Role::where(['name'=>'user'])->first();
            $user3->assignRole($roleuser3);

            $this->command->info("Creating '{ahmed}'");
            // Create default user for each role
            $user4 = User::create([
                'country_id'=>63,
                'phone_no' => '1112115406',                    
                'email' => 'ahmed'.'@gmail'.'.com',
                'password' => 'password',
            ]);
            $roleuser4=Role::where(['name'=>'user'])->first();
            $user4->assignRole($roleuser4);

        }
  
      
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return  void
     */
    public function truncateLaratrustTables()
    {
        $this->command->info('Truncating User, Role and Permission tables');
        Schema::disableForeignKeyConstraints();

        DB::table('permission_role')->truncate();
        DB::table('role_user')->truncate();

        if (Config::get('laratrust_seeder.truncate_tables')) {
            DB::table('roles')->truncate();
            DB::table('permissions')->truncate();
            
            if (Config::get('laratrust_seeder.create_users')) {
                $usersTable = (new User)->getTable();
                DB::table($usersTable)->truncate();
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}
