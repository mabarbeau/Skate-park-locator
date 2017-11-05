<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    protected $roles = [
        [ 'name' => 'basic'  ],
        [ 'name' => 'editor' ],
        [ 'name' => 'admin' ],
        [ 'name' => 'super-admin' ]
    ];

    protected $permissions = [
        [ 'name' => 'create'  ],
        // [ 'name' => 'read'    ],
        [ 'name' => 'update'  ],
        [ 'name' => 'delete'  ],
        [ 'name' => 'restore' ]
    ];

    protected $role_permissions = [
        'basic@create',
        'editor@create',
        'editor@update',
        'admin@create',
        'admin@update',
        'admin@delete',
        'super-admin@create',
        'super-admin@update',
        'super-admin@delete',
        'super-admin@restore',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create('App\Role', $this->roles);
        $this->create('App\Permission', $this->permissions);
        $this->assign($this->role_permissions);
    }

    protected function create($type, $data){
        foreach ($data as $role) {
            if( $type::where('name', $role['name'])->count() <= 0 ){
                $owner = new $type($role);
                $owner->save();
                echo "Created $type: " . $role['name'] . "\n";
            }else{
                echo "Found $type: " . $role['name'] . "\n";
            }
        }
    }

    protected function assign($data){
        foreach ($data as $item ) {
            $arr = explode('@', $item);
            $role_name = $arr[0];
            $permission_name = $arr[1];

            $role = App\Role::where('name', $role_name)->firstOrFail();
            $count = $role->permissions()->where('name', $permission_name)->count();
            if( $count == 0 ){
                $permission = App\Permission::where('name', $permission_name)->firstOrFail();
                $role->permissions()->attach([$permission->id]) ;
                echo "Created pivot: $item \n";
            }else{
                echo "Found pivot: $item \n";
            }
        }
    }


}
