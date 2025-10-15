<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Sex;
use App\Models\State;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $permissions_super = [
            'user.index',
            'user.create',
            'user.show',
            'user.delete',
            'user.update',
            'user.status',

            'sex.index',
            'sex.create',
            'sex.show',
            'sex.delete',
            'sex.update',
            'sex.status',

            'country.index',
            'country.create',
            'country.show',
            'country.delete',
            'country.update',
            'country.status',

            'state.index',
            'state.create',
            'state.show',
            'state.delete',
            'state.update',
            'state.status',

            'city.index',
            'city.create',
            'city.show',
            'city.delete',
            'city.update',
            'city.status',

            'unit.index',
            'unit.create',
            'unit.show',
            'unit.delete',
            'unit.update',
            'unit.status',

            'classe.index',
            'classe.create',
            'classe.show',
            'classe.delete',
            'classe.update',
            'classe.status',

            'program.index',
            'program.create',
            'program.show',
            'program.delete',
            'program.update',
            'program.status',

            'student.index',
            'student.create',
            'student.show',
            'student.delete',
            'student.update',
            'student.status',

            'slide.index',
            'slide.create',
            'slide.show',
            'slide.delete',
            'slide.update',
            'slide.status',

            'action.index',
            'action.create',
            'action.show',
            'action.delete',
            'action.update',
            'action.status',

            'testimonial.index',
            'testimonial.create',
            'testimonial.show',
            'testimonial.delete',
            'testimonial.update',
            'testimonial.status',

            'about.show',
            'about.update',

            'testimonial.index',
            'testimonial.create',
            'testimonial.show',
            'testimonial.delete',
            'testimonial.update',
            'testimonial.status',

            'role.index',
            'role.create',
            'role.show',
            'role.delete',
            'role.update',
            'role.status',


            'annotation.index',
            'annotation.create',
            'annotation.show',
            'annotation.delete',
            'annotation.update',
            'annotation.status',

            'about.index',
            'about.create',
            'about.show',
            'about.delete',
            'about.update',
            'about.status',

            'action_line.index',
            'action_line.create',
            'action_line.show',
            'action_line.delete',
            'action_line.update',
            'action_line.status',

            'partner.index',
            'partner.create',
            'partner.show',
            'partner.delete',
            'partner.update',
            'partner.status',

            'office.index',
            'office.create',
            'office.show',
            'office.delete',
            'office.update',
            'office.status',

            'team.index',
            'team.create',
            'team.show',
            'team.delete',
            'team.update',
            'team.status',

            'report.index',
            'report.create',
            'report.show',
            'report.delete',
            'report.update',
            'report.status',



            'definition.index',
            'definition.create',
            'definition.show',
            'definition.delete',
            'definition.update',
            'definition.status',


            'research.index',
            'research.create',
            'research.show',
            'research.delete',
            'research.update',
            'research.status',


            'newsletter.index',
            'newsletter.delete',
            'newsletter.status',

            'post_instagram.index',
            'post_instagram.create',
            'post_instagram.show',
            'post_instagram.delete',
            'post_instagram.update',
            'post_instagram.status',

            

            'school.index',
            'school.create',
            'school.show',
            'school.delete',
            'school.update',
            'school.status',

        ];


        if (!Role::where('name', 'admin')->exists()) {
            $admin_role      = Role::create(['name' => 'admin']);
        }
        if (!Role::where('name', 'educator')->exists()) {
            Role::create(['name' => 'educator']);
        }

        foreach ($permissions_super as $key => $permission) {

            $admin_role = (!isset($admin_role)) ? Role::where('name', 'admin')->first() : $admin_role;

            if (!Permission::where('name', $permission)->exists()) {
                Permission::create([
                    'name' => $permission,
                ]);
            }
            $admin_role->givePermissionTo($permission);
        }

        if (!User::where('email', 'admin@codeall.dev')->exists()) {
            $admin = User::create([
                'name'           => 'Administrador',
                'surname'        => 'Sistema',
                'email'          => 'admin@codeall.dev',
                'sexe_id'        => '1',
                'password'       => '123',
                'image'          => 'default.jpg',
                'status'         => '1',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ]);
            $admin->assignRole('admin');
        }


        $countries = \DB::table('countries')->first();

        if (empty($countries)) {
            $json = File::get(public_path("json/countries.json"));
            $countries = json_decode($json);

            foreach ($countries as $key => $value) {

                $create = (array) $value;
                $create['id'] = $value->countries_id;

                unset($create['countries_id']);

                Country::create($create);
            }
        }
        $states = \DB::table('states')->first();

        if (empty($states)) {
            $json = File::get(public_path("json/states.json"));
            $states = json_decode($json);

            foreach ($states as $key => $value) {

                $create = (array) $value;
                $create['id'] = $value->states_id;
                $create['country_id'] = $value->countries_id;

                unset($create['states_id']);
                unset($create['countries_id']);

                State::create($create);
            }
        }
        $cities = \DB::table('cities')->first();

        if (empty($cities)) {
            $json = File::get(public_path("json/cities.json"));
            $cities = json_decode($json);

            foreach ($cities as $key => $value) {

                $create = (array) $value;
                $create['id'] = $value->cities_id;

                $create['state_id'] = $value->states_id;

                unset($create['cities_id']);
                unset($create['states_id']);

                City::create($create);
            }
        }

        $sexes = \DB::table('sexes')->first();

        if (empty($sexes)) {
            $json = File::get(public_path("json/sexes.json"));
            $sexes = json_decode($json);


            foreach ($sexes as $key => $value) {

                $create = (array) $value;

                Sex::create($create);
            }
        }

        foreach (User::whereNotIn('id', [1, 2, 3])->get() as $key => $value) {
            if (!$value->hasRole('educator')) {
                $value->assignRole('educator');
            }
        }
    }
}
