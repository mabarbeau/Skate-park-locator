<?php

use Illuminate\Database\Seeder;

class EntrustSeeder extends Seeder
{
    protected $roles = [
        [
            'name' => 'user',
            'display_name' => 'Basic User',
            'description' => 'User account has been verifed',
        ],
        [
            'name' => 'owner',
            'display_name' => 'Project Owner',
            'description' => 'User is the owner of a given project',
        ],
        [
            'name' => 'admin',
            'display_name' => 'User Administrator',
            'description' => 'User is allowed to manage and edit other users',
        ],
    ];

    protected $permissions = [
        [
            'name' => 'create-post',
            'display_name' => 'Create Posts',
            'description' => 'create new blog posts',
        ],
        [
            'name' => 'edit-user',
            'display_name' => 'Edit Users',
            'description' => 'edit existing users',
        ],
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
    }

    protected function create($type, $data){
        foreach ($data as $role) {
            if( $type::where('name', $role['name'])->count() <= 0 ){
                $owner = new $type($role);
                $owner->save();
            }
        }
    }
}
