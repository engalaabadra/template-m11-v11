<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadmin' => [
            'users' => 'r,t,res,r-a,sh,c,s,e,u,d,f-d',
            'roles' => 'r,t,res,r-a,sh,c,s,e,u,d,f-d',
            'countries' => 'r,t,res,r-a,sh,c,s,e,u,d,f-d',
            'cities' => 'r,t,res,r-a,sh,c,s,e,u,d,f-d',
            'states' => 'r,t,res,r-a,sh,c,s,e,u,d,f-d',
            'areas' => 'r,t,res,r-a,sh,c,s,e,u,d,f-d',
            'addresses' => 'r,t,res,r-a,sh,c,s,e,u,d,f-d',

        ],
        'admin' => [
            'countries' => 'r,t,res,r-a,sh,c,s,e,u,d,f-d',
            'cities' => 'r,t,res,r-a,sh,c,s,e,u,d,f-d',
            'states' => 'r,t,res,r-a,sh,c,s,e,u,d,f-d',
            'areas' => 'r,t,res,r-a,sh,c,s,e,u,d,f-d',
            'addresses' => 'r,t,res,r-a,sh,c,s,e,u,d,f-d',

        ],


        'user' => [

        ],

    ],

    'permissions_map' => [
        'r' => 'read',
        't' => 'trash',
        'res' => 'restore',
        'r-a' => 'restore-all',
        'sh' => 'show',
        'c' => 'create',
        's' => 'store',
        'e' => 'edit',
        'u' => 'update',
        'd' => 'destroy',
        'f-d' => 'force-delete',


    ]
];
