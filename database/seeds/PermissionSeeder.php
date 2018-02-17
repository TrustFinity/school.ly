<?php

use App\Models\Entrust\Role;
use Illuminate\Database\Seeder;
use App\Models\Entrust\SystemResource;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedDirector();
        $this->seedHeadTeacher();
        $this->seedDeputyHeadTeacher();
        $this->seedAdministrator();
        $this->seedDOS();
        $this->seedBusar();
        $this->seedIT();
        $this->seedTeacher();
        $this->seedSupportStaff();
    }

    public function seedDirector()
    {
        foreach (SystemResource::all() as $resource) {
            Role::where('name', Role::DIRECTOR)
                ->first()
                ->resources()
                ->syncWithoutDetaching($resource->id);
        }
    }

    public function seedHeadTeacher()
    {
        foreach (SystemResource::all() as $resource) {
            Role::where('name', Role::HEADTEACHER)
                ->first()
                ->resources()
                ->syncWithoutDetaching($resource->id);
        }
    }

    public function seedDeputyHeadTeacher()
    {
        foreach (SystemResource::all() as $resource) {
            Role::where('name', Role::DEPUTY_HEADTEACHER)
                ->first()
                ->resources()
                ->syncWithoutDetaching($resource->id);
        }
    }

    public function seedAdministrator()
    {
        $resources = [
            'dashboard',
            'settings',
            'users',
            'roles',
            'teachers',
            'students',
            'reports',
            'levels',
            'support-staff',
        ];

        foreach ($resources as $resource) {
            $system_resource = SystemResource::where('name', $resource)->first();
            Role::where('name', Role::ADMINISTRATOR)
                ->first()
                ->resources()
                ->syncWithoutDetaching($system_resource->id);
        }
    }

    public function seedDOS()
    {
        $resources = [
            'dashboard',
            'teachers',
            'students',
            'class-groups',
            'streams',
            'levels',
            'subjects',
            'reports',
        ];

        foreach ($resources as $resource) {
            $system_resource = SystemResource::where('name', $resource)->first();
            Role::where('name', Role::DOS)
                ->first()
                ->resources()
                ->syncWithoutDetaching($system_resource->id);
        }
    }

    public function seedBusar()
    {
        $resources = [
            'dashboard',
            'chart-of-accounts',
            'transactions',
            'reports',
        ];

        foreach ($resources as $resource) {
            $system_resource = SystemResource::where('name', $resource)->first();
            Role::where('name', Role::BUSAR)
                ->first()
                ->resources()
                ->syncWithoutDetaching($system_resource->id);
        }
    }

    public function seedIT()
    {
        $resources = [
            'dashboard',
            'settings',
            'users',
            'roles',
            'teachers',
            'students',
            'class-groups',
            'streams',
            'levels',
            'subjects',
            'reports',
        ];

        foreach ($resources as $resource) {
            $system_resource = SystemResource::where('name', $resource)->first();
            Role::where('name', Role::IT)
                ->first()
                ->resources()
                ->syncWithoutDetaching($system_resource->id);
        }
    }

    public function seedTeacher()
    {
        $resources = [
            'dashboard',
            'teachers',
            'students',
            'class-groups',
            'streams',
            'levels',
            'subjects',
            'attendances',
            'reports',
        ];

        foreach ($resources as $resource) {
            $system_resource = SystemResource::where('name', $resource)->first();
            Role::where('name', Role::TEACHER)
                ->first()
                ->resources()
                ->syncWithoutDetaching($system_resource->id);
        }
    }

    public function seedSupportStaff()
    {
        $resources = [
            'dashboard',
            'students',
            'reports',
            'support-staff',
        ];

        foreach ($resources as $resource) {
            $system_resource = SystemResource::where('name', $resource)->first();
            Role::where('name', Role::SUPPORT_STAFF)
                ->first()
                ->resources()
                ->syncWithoutDetaching($system_resource->id);
        }
    }
}
