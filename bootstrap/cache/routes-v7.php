<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2cfrGKiHKRdDyPSE',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/region/countries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.region.countries',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/region/metrics' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.dashboard--OLD',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/testings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tests.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clear-cache' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8nr70dpwxpMgHEMl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/acoes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.actions',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/instituto' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.abouts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/contato' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.contacts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/parceiros' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.partners',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/relatorios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/polos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.units',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/programas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.programs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/linhas-de-acao' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.action-lines',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/newsletter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.newsletter.save',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reload-captcha' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'site-reload-captcha',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'backend.login.auth',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/recuperar-senha' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.login.forgot',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/recuperar-senha/resquest' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.login.forgot.request',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.auth.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/profile/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.profile.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/users/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.users.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/group-users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.group.users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/group-users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.group.users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/group-users/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.group.users.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/sexes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.sexes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/sexes/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.sexes.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/sexes/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.sexes.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/countries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.countries.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/countries/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.countries.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/countries/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.countries.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/states' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.states.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/states/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.states.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/states/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.states.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/cities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.cities.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/cities/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.cities.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/cities/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.cities.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/units' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.units.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/units/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.units.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/units/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.units.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/classes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.classes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/classes/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.classes.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/classes/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.classes.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/schools' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.schools.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/schools/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.schools.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/schools/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.schools.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/researches' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.researches.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/students' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.students.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/students/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.students.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/students/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.students.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/programs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.programs.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/programs/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.programs.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/programs/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.programs.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/annotations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.annotations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/annotations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.annotations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/annotations/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.annotations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/api/classes/units' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.api.classes.units',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/offices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.offices.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/offices/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.offices.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/offices/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.offices.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/slides' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.slides.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/slides/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.slides.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/slides/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.slides.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/actions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.actions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/actions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.actions.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/actions/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.actions.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/testimonials' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.testimonials.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/testimonials/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.testimonials.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/testimonials/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.testimonials.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/partners' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.partners.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/partners/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.partners.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/partners/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.partners.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/action-lines' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.action-lines.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/action-lines/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.action-lines.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/action-lines/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.action-lines.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/teams' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.teams.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/teams/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.teams.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/teams/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.teams.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.reports.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/reports/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.reports.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/reports/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.reports.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/abouts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.abouts.show',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/abouts/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.abouts.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/definitions-global' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.definitions.show',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/definitions-global/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.definitions.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/newsletter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.newsletter.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/newsletter/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.newsletter.export',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/posts-instagram' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.posts-instagram.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/posts-instagram/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.posts-instagram.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sys/app/frontend/posts-instagram/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.posts-instagram.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/captcha(?|/api(?:/([^/]++))?(*:36)|(?:/([^/]++))?(*:57))|/a(?|pi/region/(?|s(?|tates(?:/([^/]++))?(*:106)|earch(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:161))|cities(?:/([^/]++))?(*:190))|cao/([^/]++)/([^/]++)(*:220))|/relatorio/([^/]++)/([^/]++)(*:257)|/p(?|olo/([^/]++)/([^/]++)(*:291)|rograma/([^/]++)/([^/]++)(*:324))|/download/generate/([^/]++)/([^/]++)(*:369)|/s(?|end/([^/]++)(*:394)|ys/(?|reset\\-password/(?|([^/]++)(*:435)|submit(*:449))|a(?|ccess/([^/]++)(*:476)|pp/(?|dashboard/metrics/([^/]++)(*:516)|u(?|sers/(?|s(?|how/([^/]++)(*:552)|tatus/([^/]++)(*:574)|end\\-link/([^/]++)(*:600))|update/([^/]++)(*:624)|delete/([^/]++)(*:647)|generate/record/([^/]++)(*:679))|nits/(?|s(?|how/([^/]++)(*:712)|tatus/([^/]++)(*:734))|update/([^/]++)(*:758)|delete/([^/]++)(*:781)))|group\\-users/(?|s(?|how/([^/]++)(*:823)|tatus/([^/]++)(*:845))|update/([^/]++)(*:869)|delete/([^/]++)(*:892))|s(?|exes/(?|s(?|how/([^/]++)(*:929)|tatus/([^/]++)(*:951))|update/([^/]++)(*:975)|delete/([^/]++)(*:998))|t(?|ates/(?|s(?|how/([^/]++)(*:1035)|tatus/([^/]++)(*:1058))|update/([^/]++)(*:1083)|delete/([^/]++)(*:1107))|udents/(?|s(?|how/([^/]++)(*:1143)|tatus/([^/]++)(*:1166))|update/([^/]++)(*:1191)|record/([^/]++)(*:1215)|transfer/([^/]++)(*:1241)|delete/([^/]++)(*:1265)|export/generate/([^/]++)(*:1298)))|chools/(?|update/([^/]++)(*:1334)|s(?|how/([^/]++)(*:1359)|tatus/([^/]++)(*:1382))|delete/([^/]++)(*:1407)))|c(?|ountries/(?|s(?|how/([^/]++)(*:1450)|tatus/([^/]++)(*:1473))|update/([^/]++)(*:1498)|delete/([^/]++)(*:1522))|ities/(?|s(?|how/([^/]++)(*:1557)|tatus/([^/]++)(*:1580))|update/([^/]++)(*:1605)|delete/([^/]++)(*:1629))|lasses/(?|s(?|how/([^/]++)(*:1665)|tatus/([^/]++)(*:1688))|update/([^/]++)(*:1713)|delete/([^/]++)(*:1737)))|researches/(?|show/([^/]++)(*:1775)|update/(?|([^/]++)(*:1802)|institutional/([^/]++)(*:1833))|imprimir/([^/]++)(*:1860)|export/generate/([^/]++)(*:1893)|api/req/([^/]++)(*:1918))|programs/(?|s(?|how/([^/]++)(*:1956)|tatus/([^/]++)(*:1979))|update/([^/]++)(*:2004)|delete/([^/]++)(*:2028))|a(?|nnotations/(?|s(?|how/([^/]++)(*:2072)|tatus/([^/]++)(*:2095))|update/([^/]++)(*:2120)|delete/([^/]++)(*:2144))|pi/(?|classes/(?|program(?:/([^/]++))?(*:2192)|classes(?:/([^/]++)(?:/([^/]++))?)?(*:2236))|archives/(?|get/([^/]++)(?:/([^/]++))?(*:2284)|upload/([^/]++)(?:/([^/]++))?(*:2322)|destroy(?:/([^/]++))?(*:2352))|schools/years(?:/([^/]++))?(*:2389)))|offices/(?|s(?|how/([^/]++)(*:2427)|tatus/([^/]++)(*:2450))|update/([^/]++)(*:2475)|delete/([^/]++)(*:2499))|frontend/(?|slides/(?|s(?|how/([^/]++)(*:2547)|tatus/([^/]++)(*:2570))|update/([^/]++)(*:2595)|delete/([^/]++)(*:2619))|action(?|s/(?|s(?|how/([^/]++)(*:2659)|tatus/([^/]++)(*:2682))|update/([^/]++)(*:2707)|delete/([^/]++)(*:2731))|\\-lines/(?|s(?|how/([^/]++)(*:2768)|tatus/([^/]++)(*:2791))|update/([^/]++)(*:2816)|delete/([^/]++)(*:2840)))|te(?|stimonials/(?|s(?|how/([^/]++)(*:2886)|tatus/([^/]++)(*:2909))|update/([^/]++)(*:2934)|delete/([^/]++)(*:2958))|ams/(?|s(?|how/([^/]++)(*:2991)|tatus/([^/]++)(*:3014))|update/([^/]++)(*:3039)|delete/([^/]++)(*:3063)))|p(?|artners/(?|s(?|how/([^/]++)(*:3105)|tatus/([^/]++)(*:3128))|update/([^/]++)(*:3153)|delete/([^/]++)(*:3177))|osts\\-instagram/(?|s(?|how/([^/]++)(*:3222)|tatus/([^/]++)(*:3245))|update/([^/]++)(*:3270)|delete/([^/]++)(*:3294)))|reports/(?|s(?|how/([^/]++)(*:3332)|tatus/([^/]++)(*:3355))|update/([^/]++)(*:3380)|delete/([^/]++)(*:3404)|trash\\-file/([^/]++)(*:3433))|newsletter/(?|status/([^/]++)(*:3472)|delete/([^/]++)(*:3496)))))|view/([^/]++)(*:3522))))/?$}sDu',
    ),
    3 => 
    array (
      36 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BP5jedjOlilHKXYX',
            'config' => NULL,
          ),
          1 => 
          array (
            0 => 'config',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      57 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JGp5XYihLXTaRYZg',
            'config' => NULL,
          ),
          1 => 
          array (
            0 => 'config',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      106 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.region.states',
            'country_id' => NULL,
          ),
          1 => 
          array (
            0 => 'country_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      161 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.region.search',
            'city' => NULL,
            'state' => NULL,
            'contry' => NULL,
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'state',
            2 => 'contry',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      190 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.region.cities',
            'state_id' => NULL,
          ),
          1 => 
          array (
            0 => 'state_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      220 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.actions.show',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      257 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.reports.show',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      291 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.units.show',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      324 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.programs.show',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      369 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.download.file',
          ),
          1 => 
          array (
            0 => 'file',
            1 => 'path',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      394 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.forms.send',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      435 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.login.forgot.password.get',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      449 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.login.forgot.password.submit',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      476 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.login.token',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      516 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.dashboard',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      552 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.users.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      574 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.users.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      600 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.users.send-link',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      624 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.users.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      647 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.users.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      679 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.users.record',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      712 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.units.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      734 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.units.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      758 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.units.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      781 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.units.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      823 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.group.users.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      845 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.group.users.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      869 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.group.users.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      892 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.group.users.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      929 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.sexes.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      951 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.sexes.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      975 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.sexes.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      998 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.sexes.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1035 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.states.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1058 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.states.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1083 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.states.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1107 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.states.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1143 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.students.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1166 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.students.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1191 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.students.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1215 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.students.record',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1241 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.students.transfer',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1265 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.students.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1298 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.students.export',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1334 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.schools.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1359 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.schools.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1382 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.schools.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1407 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.schools.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1450 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.countries.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1473 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.countries.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1498 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.countries.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1522 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.countries.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1557 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.cities.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1580 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.cities.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1605 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.cities.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1629 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.cities.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1665 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.classes.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1688 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.classes.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1713 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.classes.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1737 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.classes.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1775 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.researches.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1802 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.researches.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1833 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.researches-institutional.update',
          ),
          1 => 
          array (
            0 => 'institutional_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1860 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.researches.print',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1893 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.researches.export',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1918 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.researches.api',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1956 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.programs.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1979 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.programs.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2004 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.programs.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2028 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.programs.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2072 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.annotations.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2095 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.annotations.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2120 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.annotations.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2144 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.annotations.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2192 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.api.classes.programs',
            'unit_id' => NULL,
          ),
          1 => 
          array (
            0 => 'unit_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2236 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.api.classes.classes',
            'program_id' => NULL,
            'unit_id' => NULL,
          ),
          1 => 
          array (
            0 => 'program_id',
            1 => 'unit_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2284 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.api.archives.get',
            'entity_id' => NULL,
          ),
          1 => 
          array (
            0 => 'entity',
            1 => 'entity_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2322 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.api.archives.send',
            'entity_id' => NULL,
          ),
          1 => 
          array (
            0 => 'entity',
            1 => 'entity_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2352 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.api.archives.destroy',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2389 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.api.schools.get',
            'type' => NULL,
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2427 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.offices.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2450 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.offices.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2475 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.offices.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2499 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.offices.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2547 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.slides.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2570 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.slides.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2595 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.slides.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2619 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.slides.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2659 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.actions.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2682 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.actions.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2707 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.actions.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2731 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.actions.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2768 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.action-lines.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2791 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.action-lines.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2816 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.action-lines.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2840 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.action-lines.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2886 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.testimonials.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2909 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.testimonials.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2934 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.testimonials.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2958 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.testimonials.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2991 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.teams.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3014 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.teams.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3039 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.teams.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3063 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.teams.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3105 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.partners.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3128 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.partners.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3153 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.partners.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3177 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.partners.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3222 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.posts-instagram.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3245 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.posts-instagram.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3270 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.posts-instagram.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3294 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.posts-instagram.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3332 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.reports.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3355 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.reports.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3380 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.reports.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3404 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.reports.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3433 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.reports.trash-file',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3472 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.newsletter.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3496 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backend.frontend.newsletter.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3522 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::muMdkODGyR9JGt0M',
          ),
          1 => 
          array (
            0 => 'path',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::2cfrGKiHKRdDyPSE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::2cfrGKiHKRdDyPSE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BP5jedjOlilHKXYX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'captcha/api/{config?}',
      'action' => 
      array (
        'uses' => '\\Mews\\Captcha\\CaptchaController@getCaptchaApi',
        'controller' => '\\Mews\\Captcha\\CaptchaController@getCaptchaApi',
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::BP5jedjOlilHKXYX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JGp5XYihLXTaRYZg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'captcha/{config?}',
      'action' => 
      array (
        'uses' => '\\Mews\\Captcha\\CaptchaController@getCaptcha',
        'controller' => '\\Mews\\Captcha\\CaptchaController@getCaptcha',
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::JGp5XYihLXTaRYZg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.region.countries' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/region/countries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\RegionController@countries',
        'controller' => 'App\\Http\\Controllers\\Api\\RegionController@countries',
        'namespace' => NULL,
        'prefix' => 'api/region',
        'where' => 
        array (
        ),
        'as' => 'api.region.countries',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.region.states' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/region/states/{country_id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\RegionController@states',
        'controller' => 'App\\Http\\Controllers\\Api\\RegionController@states',
        'namespace' => NULL,
        'prefix' => 'api/region',
        'where' => 
        array (
        ),
        'as' => 'api.region.states',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.region.cities' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/region/cities/{state_id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\RegionController@cities',
        'controller' => 'App\\Http\\Controllers\\Api\\RegionController@cities',
        'namespace' => NULL,
        'prefix' => 'api/region',
        'where' => 
        array (
        ),
        'as' => 'api.region.cities',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.region.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/region/search/{city?}/{state?}/{contry?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\RegionController@search',
        'controller' => 'App\\Http\\Controllers\\Api\\RegionController@search',
        'namespace' => NULL,
        'prefix' => 'api/region',
        'where' => 
        array (
        ),
        'as' => 'api.region.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.dashboard--OLD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/region/metrics',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MetricsController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\MetricsController@index',
        'namespace' => NULL,
        'prefix' => 'api/region',
        'where' => 
        array (
        ),
        'as' => 'api.dashboard--OLD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tests.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'testings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Test\\TestController@index',
        'controller' => 'App\\Http\\Controllers\\Test\\TestController@index',
        'namespace' => 'Tests',
        'prefix' => '/testings',
        'where' => 
        array (
        ),
        'as' => 'tests.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8nr70dpwxpMgHEMl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clear-cache',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:410:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:191:"function() {
   $exitCode = \\Illuminate\\Support\\Facades\\Artisan::call(\'cache:clear\');
   $exitCode = \\Illuminate\\Support\\Facades\\Artisan::call(\'route:cache\');
   // return what you want
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000004783421a000000007ee2cbe2";}";s:4:"hash";s:44:"UTqrXOi+sBCCoZBCh9R6gDcXpQU+hAzV0Q42XkdM0K0=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::8nr70dpwxpMgHEMl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@index',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.actions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'acoes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\ActionsController@index',
        'controller' => 'App\\Http\\Controllers\\Frontend\\ActionsController@index',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.actions',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.actions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'acao/{id}/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\ActionsController@show',
        'controller' => 'App\\Http\\Controllers\\Frontend\\ActionsController@show',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.actions.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.abouts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'instituto',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\AboutsController@index',
        'controller' => 'App\\Http\\Controllers\\Frontend\\AboutsController@index',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.abouts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.contacts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'contato',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\ContactsController@index',
        'controller' => 'App\\Http\\Controllers\\Frontend\\ContactsController@index',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.contacts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.partners' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'parceiros',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PartnersController@index',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PartnersController@index',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.partners',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'relatorios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\ReportsController@index',
        'controller' => 'App\\Http\\Controllers\\Frontend\\ReportsController@index',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.reports.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'relatorio/{id}/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\ReportsController@show',
        'controller' => 'App\\Http\\Controllers\\Frontend\\ReportsController@show',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.reports.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.units' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'polos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\UnitsController@index',
        'controller' => 'App\\Http\\Controllers\\Frontend\\UnitsController@index',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.units',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.units.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'polo/{id}/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\UnitsController@show',
        'controller' => 'App\\Http\\Controllers\\Frontend\\UnitsController@show',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.units.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.programs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'programas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\ProgramsController@index',
        'controller' => 'App\\Http\\Controllers\\Frontend\\ProgramsController@index',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.programs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.programs.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'programa/{id}/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\ProgramsController@show',
        'controller' => 'App\\Http\\Controllers\\Frontend\\ProgramsController@show',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.programs.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.action-lines' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'linhas-de-acao',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\ActionLinesController@index',
        'controller' => 'App\\Http\\Controllers\\Frontend\\ActionLinesController@index',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.action-lines',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.download.file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'download/generate/{file}/{path}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\DownloadsController@download',
        'controller' => 'App\\Http\\Controllers\\Frontend\\DownloadsController@download',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.download.file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.newsletter.save' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'newsletter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\NewsletterController@save',
        'controller' => 'App\\Http\\Controllers\\Frontend\\NewsletterController@save',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.newsletter.save',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.forms.send' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'send/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\FormsController@send',
        'controller' => 'App\\Http\\Controllers\\Frontend\\FormsController@send',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'frontend.forms.send',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'site-reload-captcha' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reload-captcha',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\FormsController@reloadCaptcha',
        'controller' => 'App\\Http\\Controllers\\Frontend\\FormsController@reloadCaptcha',
        'namespace' => 'Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'site-reload-captcha',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Backend\\AuthController@login',
        'namespace' => 'Backend',
        'prefix' => '/sys',
        'where' => 
        array (
        ),
        'as' => 'backend.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.login.auth' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AuthController@auth',
        'controller' => 'App\\Http\\Controllers\\Backend\\AuthController@auth',
        'namespace' => 'Backend',
        'prefix' => '/sys',
        'where' => 
        array (
        ),
        'as' => 'backend.login.auth',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.login.forgot' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/recuperar-senha',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AuthController@forgot',
        'controller' => 'App\\Http\\Controllers\\Backend\\AuthController@forgot',
        'namespace' => 'Backend',
        'prefix' => '/sys',
        'where' => 
        array (
        ),
        'as' => 'backend.login.forgot',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.login.forgot.request' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/recuperar-senha/resquest',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AuthController@forgotRequest',
        'controller' => 'App\\Http\\Controllers\\Backend\\AuthController@forgotRequest',
        'namespace' => 'Backend',
        'prefix' => '/sys',
        'where' => 
        array (
        ),
        'as' => 'backend.login.forgot.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.login.forgot.password.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/reset-password/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AuthController@showResetPasswordForm',
        'controller' => 'App\\Http\\Controllers\\Backend\\AuthController@showResetPasswordForm',
        'namespace' => 'Backend',
        'prefix' => '/sys',
        'where' => 
        array (
        ),
        'as' => 'backend.login.forgot.password.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.login.forgot.password.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/reset-password/submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AuthController@submitResetPasswordForm',
        'controller' => 'App\\Http\\Controllers\\Backend\\AuthController@submitResetPasswordForm',
        'namespace' => 'Backend',
        'prefix' => '/sys',
        'where' => 
        array (
        ),
        'as' => 'backend.login.forgot.password.submit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.login.token' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/access/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AuthController@token',
        'controller' => 'App\\Http\\Controllers\\Backend\\AuthController@token',
        'namespace' => 'Backend',
        'prefix' => '/sys',
        'where' => 
        array (
        ),
        'as' => 'backend.login.token',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.auth.logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Backend\\AuthController@logout',
        'namespace' => 'Backend',
        'prefix' => 'sys/app',
        'where' => 
        array (
        ),
        'as' => 'backend.auth.logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\DashboardController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/dashboard',
        'where' => 
        array (
        ),
        'as' => 'backend.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/dashboard/metrics/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\DashboardController@metrics',
        'controller' => 'App\\Http\\Controllers\\Backend\\DashboardController@metrics',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/dashboard',
        'where' => 
        array (
        ),
        'as' => 'api.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProfileController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProfileController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/profile',
        'where' => 
        array (
        ),
        'as' => 'backend.profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/profile/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProfileController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProfileController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/profile',
        'where' => 
        array (
        ),
        'as' => 'backend.profile.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/users',
        'where' => 
        array (
        ),
        'as' => 'backend.users.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/users/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/users',
        'where' => 
        array (
        ),
        'as' => 'backend.users.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/users/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/users',
        'where' => 
        array (
        ),
        'as' => 'backend.users.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.users.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/users/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/users',
        'where' => 
        array (
        ),
        'as' => 'backend.users.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.users.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/users/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/users',
        'where' => 
        array (
        ),
        'as' => 'backend.users.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.users.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/users/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/users',
        'where' => 
        array (
        ),
        'as' => 'backend.users.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.users.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/users/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/users',
        'where' => 
        array (
        ),
        'as' => 'backend.users.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.users.send-link' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/users/send-link/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@sendLink',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@sendLink',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/users',
        'where' => 
        array (
        ),
        'as' => 'backend.users.send-link',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.users.record' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/users/generate/record/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@record',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@record',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/users',
        'where' => 
        array (
        ),
        'as' => 'backend.users.record',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.group.users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/group-users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/group-users',
        'where' => 
        array (
        ),
        'as' => 'backend.group.users.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.group.users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/group-users/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/group-users',
        'where' => 
        array (
        ),
        'as' => 'backend.group.users.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.group.users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/group-users/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/group-users',
        'where' => 
        array (
        ),
        'as' => 'backend.group.users.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.group.users.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/group-users/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/group-users',
        'where' => 
        array (
        ),
        'as' => 'backend.group.users.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.group.users.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/group-users/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/group-users',
        'where' => 
        array (
        ),
        'as' => 'backend.group.users.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.group.users.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/group-users/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/group-users',
        'where' => 
        array (
        ),
        'as' => 'backend.group.users.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.group.users.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/group-users/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\GroupUsersController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/group-users',
        'where' => 
        array (
        ),
        'as' => 'backend.group.users.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.sexes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/sexes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SexesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\SexesController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/sexes',
        'where' => 
        array (
        ),
        'as' => 'backend.sexes.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.sexes.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/sexes/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SexesController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\SexesController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/sexes',
        'where' => 
        array (
        ),
        'as' => 'backend.sexes.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.sexes.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/sexes/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SexesController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\SexesController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/sexes',
        'where' => 
        array (
        ),
        'as' => 'backend.sexes.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.sexes.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/sexes/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SexesController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\SexesController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/sexes',
        'where' => 
        array (
        ),
        'as' => 'backend.sexes.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.sexes.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/sexes/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SexesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\SexesController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/sexes',
        'where' => 
        array (
        ),
        'as' => 'backend.sexes.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.sexes.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/sexes/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SexesController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\SexesController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/sexes',
        'where' => 
        array (
        ),
        'as' => 'backend.sexes.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.sexes.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/sexes/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SexesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\SexesController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/sexes',
        'where' => 
        array (
        ),
        'as' => 'backend.sexes.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.countries.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/countries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CountriesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\CountriesController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/countries',
        'where' => 
        array (
        ),
        'as' => 'backend.countries.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.countries.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/countries/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CountriesController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\CountriesController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/countries',
        'where' => 
        array (
        ),
        'as' => 'backend.countries.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.countries.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/countries/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CountriesController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\CountriesController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/countries',
        'where' => 
        array (
        ),
        'as' => 'backend.countries.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.countries.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/countries/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CountriesController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\CountriesController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/countries',
        'where' => 
        array (
        ),
        'as' => 'backend.countries.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.countries.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/countries/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CountriesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\CountriesController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/countries',
        'where' => 
        array (
        ),
        'as' => 'backend.countries.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.countries.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/countries/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CountriesController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\CountriesController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/countries',
        'where' => 
        array (
        ),
        'as' => 'backend.countries.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.countries.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/countries/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CountriesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\CountriesController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/countries',
        'where' => 
        array (
        ),
        'as' => 'backend.countries.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.states.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/states',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StatesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\StatesController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/states',
        'where' => 
        array (
        ),
        'as' => 'backend.states.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.states.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/states/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StatesController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\StatesController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/states',
        'where' => 
        array (
        ),
        'as' => 'backend.states.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.states.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/states/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StatesController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\StatesController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/states',
        'where' => 
        array (
        ),
        'as' => 'backend.states.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.states.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/states/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StatesController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\StatesController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/states',
        'where' => 
        array (
        ),
        'as' => 'backend.states.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.states.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/states/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StatesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\StatesController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/states',
        'where' => 
        array (
        ),
        'as' => 'backend.states.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.states.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/states/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StatesController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\StatesController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/states',
        'where' => 
        array (
        ),
        'as' => 'backend.states.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.states.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/states/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StatesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\StatesController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/states',
        'where' => 
        array (
        ),
        'as' => 'backend.states.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.cities.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/cities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CitiesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\CitiesController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/cities',
        'where' => 
        array (
        ),
        'as' => 'backend.cities.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.cities.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/cities/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CitiesController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\CitiesController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/cities',
        'where' => 
        array (
        ),
        'as' => 'backend.cities.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.cities.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/cities/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CitiesController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\CitiesController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/cities',
        'where' => 
        array (
        ),
        'as' => 'backend.cities.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.cities.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/cities/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CitiesController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\CitiesController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/cities',
        'where' => 
        array (
        ),
        'as' => 'backend.cities.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.cities.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/cities/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CitiesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\CitiesController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/cities',
        'where' => 
        array (
        ),
        'as' => 'backend.cities.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.cities.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/cities/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CitiesController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\CitiesController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/cities',
        'where' => 
        array (
        ),
        'as' => 'backend.cities.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.cities.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/cities/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CitiesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\CitiesController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/cities',
        'where' => 
        array (
        ),
        'as' => 'backend.cities.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.units.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/units',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UnitsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\UnitsController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/units',
        'where' => 
        array (
        ),
        'as' => 'backend.units.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.units.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/units/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UnitsController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\UnitsController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/units',
        'where' => 
        array (
        ),
        'as' => 'backend.units.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.units.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/units/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UnitsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\UnitsController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/units',
        'where' => 
        array (
        ),
        'as' => 'backend.units.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.units.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/units/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UnitsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\UnitsController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/units',
        'where' => 
        array (
        ),
        'as' => 'backend.units.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.units.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/units/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UnitsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\UnitsController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/units',
        'where' => 
        array (
        ),
        'as' => 'backend.units.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.units.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/units/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UnitsController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\UnitsController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/units',
        'where' => 
        array (
        ),
        'as' => 'backend.units.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.units.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/units/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UnitsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\UnitsController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/units',
        'where' => 
        array (
        ),
        'as' => 'backend.units.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.classes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/classes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ClassesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClassesController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/classes',
        'where' => 
        array (
        ),
        'as' => 'backend.classes.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.classes.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/classes/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ClassesController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClassesController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/classes',
        'where' => 
        array (
        ),
        'as' => 'backend.classes.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.classes.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/classes/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ClassesController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClassesController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/classes',
        'where' => 
        array (
        ),
        'as' => 'backend.classes.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.classes.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/classes/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ClassesController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClassesController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/classes',
        'where' => 
        array (
        ),
        'as' => 'backend.classes.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.classes.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/classes/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ClassesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClassesController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/classes',
        'where' => 
        array (
        ),
        'as' => 'backend.classes.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.classes.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/classes/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ClassesController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClassesController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/classes',
        'where' => 
        array (
        ),
        'as' => 'backend.classes.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.classes.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/classes/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ClassesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClassesController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/classes',
        'where' => 
        array (
        ),
        'as' => 'backend.classes.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.schools.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/schools',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SchoolsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\SchoolsController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/schools',
        'where' => 
        array (
        ),
        'as' => 'backend.schools.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.schools.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/schools/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SchoolsController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\SchoolsController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/schools',
        'where' => 
        array (
        ),
        'as' => 'backend.schools.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.schools.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/schools/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SchoolsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\SchoolsController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/schools',
        'where' => 
        array (
        ),
        'as' => 'backend.schools.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.schools.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/schools/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SchoolsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\SchoolsController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/schools',
        'where' => 
        array (
        ),
        'as' => 'backend.schools.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.schools.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/schools/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SchoolsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\SchoolsController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/schools',
        'where' => 
        array (
        ),
        'as' => 'backend.schools.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.schools.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/schools/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SchoolsController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\SchoolsController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/schools',
        'where' => 
        array (
        ),
        'as' => 'backend.schools.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.schools.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/schools/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SchoolsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\SchoolsController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/schools',
        'where' => 
        array (
        ),
        'as' => 'backend.schools.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.researches.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/researches',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ResearchesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ResearchesController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/researches',
        'where' => 
        array (
        ),
        'as' => 'backend.researches.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.researches.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/researches/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ResearchesController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ResearchesController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/researches',
        'where' => 
        array (
        ),
        'as' => 'backend.researches.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.researches.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/researches/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ResearchesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ResearchesController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/researches',
        'where' => 
        array (
        ),
        'as' => 'backend.researches.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.researches.print' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/researches/imprimir/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ResearchesController@print',
        'controller' => 'App\\Http\\Controllers\\Backend\\ResearchesController@print',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/researches',
        'where' => 
        array (
        ),
        'as' => 'backend.researches.print',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.researches.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/researches/export/generate/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ResearchesController@export',
        'controller' => 'App\\Http\\Controllers\\Backend\\ResearchesController@export',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/researches/export',
        'where' => 
        array (
        ),
        'as' => 'backend.researches.export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.researches.api' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/researches/api/req/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ResearchesController@api',
        'controller' => 'App\\Http\\Controllers\\Backend\\ResearchesController@api',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/researches/api',
        'where' => 
        array (
        ),
        'as' => 'backend.researches.api',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.researches-institutional.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/researches/update/institutional/{institutional_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ResearchesController@institutional',
        'controller' => 'App\\Http\\Controllers\\Backend\\ResearchesController@institutional',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/researches',
        'where' => 
        array (
        ),
        'as' => 'backend.researches-institutional.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.students.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/students',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StudentsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\StudentsController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/students',
        'where' => 
        array (
        ),
        'as' => 'backend.students.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.students.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/students/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StudentsController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\StudentsController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/students',
        'where' => 
        array (
        ),
        'as' => 'backend.students.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.students.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/students/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StudentsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\StudentsController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/students',
        'where' => 
        array (
        ),
        'as' => 'backend.students.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.students.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/students/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StudentsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\StudentsController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/students',
        'where' => 
        array (
        ),
        'as' => 'backend.students.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.students.update' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'sys/app/students/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StudentsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\StudentsController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/students',
        'where' => 
        array (
        ),
        'as' => 'backend.students.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.students.record' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/students/record/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StudentsController@record',
        'controller' => 'App\\Http\\Controllers\\Backend\\StudentsController@record',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/students',
        'where' => 
        array (
        ),
        'as' => 'backend.students.record',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.students.transfer' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/students/transfer/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StudentsController@transfer',
        'controller' => 'App\\Http\\Controllers\\Backend\\StudentsController@transfer',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/students',
        'where' => 
        array (
        ),
        'as' => 'backend.students.transfer',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.students.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/students/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StudentsController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\StudentsController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/students',
        'where' => 
        array (
        ),
        'as' => 'backend.students.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.students.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/students/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StudentsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\StudentsController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/students',
        'where' => 
        array (
        ),
        'as' => 'backend.students.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.students.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/students/export/generate/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StudentsController@export',
        'controller' => 'App\\Http\\Controllers\\Backend\\StudentsController@export',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/students/export',
        'where' => 
        array (
        ),
        'as' => 'backend.students.export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.programs.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/programs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProgramsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProgramsController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/programs',
        'where' => 
        array (
        ),
        'as' => 'backend.programs.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.programs.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/programs/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProgramsController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProgramsController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/programs',
        'where' => 
        array (
        ),
        'as' => 'backend.programs.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.programs.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/programs/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProgramsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProgramsController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/programs',
        'where' => 
        array (
        ),
        'as' => 'backend.programs.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.programs.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/programs/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProgramsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProgramsController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/programs',
        'where' => 
        array (
        ),
        'as' => 'backend.programs.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.programs.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/programs/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProgramsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProgramsController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/programs',
        'where' => 
        array (
        ),
        'as' => 'backend.programs.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.programs.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/programs/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProgramsController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProgramsController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/programs',
        'where' => 
        array (
        ),
        'as' => 'backend.programs.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.programs.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/programs/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProgramsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProgramsController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/programs',
        'where' => 
        array (
        ),
        'as' => 'backend.programs.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.annotations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/annotations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/annotations',
        'where' => 
        array (
        ),
        'as' => 'backend.annotations.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.annotations.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/annotations/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/annotations',
        'where' => 
        array (
        ),
        'as' => 'backend.annotations.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.annotations.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/annotations/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/annotations',
        'where' => 
        array (
        ),
        'as' => 'backend.annotations.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.annotations.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/annotations/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/annotations',
        'where' => 
        array (
        ),
        'as' => 'backend.annotations.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.annotations.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/annotations/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/annotations',
        'where' => 
        array (
        ),
        'as' => 'backend.annotations.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.annotations.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/annotations/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/annotations',
        'where' => 
        array (
        ),
        'as' => 'backend.annotations.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.annotations.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/annotations/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\AnnotationsController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/annotations',
        'where' => 
        array (
        ),
        'as' => 'backend.annotations.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.api.classes.units' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/api/classes/units',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ClassesController@units',
        'controller' => 'App\\Http\\Controllers\\Api\\ClassesController@units',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/api/classes',
        'where' => 
        array (
        ),
        'as' => 'backend.api.classes.units',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.api.classes.programs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/api/classes/program/{unit_id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ClassesController@programs',
        'controller' => 'App\\Http\\Controllers\\Api\\ClassesController@programs',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/api/classes',
        'where' => 
        array (
        ),
        'as' => 'backend.api.classes.programs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.api.classes.classes' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/api/classes/classes/{program_id?}/{unit_id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ClassesController@classes',
        'controller' => 'App\\Http\\Controllers\\Api\\ClassesController@classes',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/api/classes',
        'where' => 
        array (
        ),
        'as' => 'backend.api.classes.classes',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.api.archives.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/api/archives/get/{entity}/{entity_id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ArchivesController@get',
        'controller' => 'App\\Http\\Controllers\\Api\\ArchivesController@get',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/api/archives',
        'where' => 
        array (
        ),
        'as' => 'backend.api.archives.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.api.archives.send' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/api/archives/upload/{entity}/{entity_id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ArchivesController@send',
        'controller' => 'App\\Http\\Controllers\\Api\\ArchivesController@send',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/api/archives',
        'where' => 
        array (
        ),
        'as' => 'backend.api.archives.send',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.api.archives.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'sys/app/api/archives/destroy/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ArchivesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\ArchivesController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/api/archives',
        'where' => 
        array (
        ),
        'as' => 'backend.api.archives.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.api.schools.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/api/schools/years/{type?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SchoolsController@get',
        'controller' => 'App\\Http\\Controllers\\Api\\SchoolsController@get',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/api/schools',
        'where' => 
        array (
        ),
        'as' => 'backend.api.schools.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.offices.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/offices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\OfficesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\OfficesController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/offices',
        'where' => 
        array (
        ),
        'as' => 'backend.offices.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.offices.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/offices/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\OfficesController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\OfficesController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/offices',
        'where' => 
        array (
        ),
        'as' => 'backend.offices.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.offices.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/offices/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\OfficesController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\OfficesController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/offices',
        'where' => 
        array (
        ),
        'as' => 'backend.offices.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.offices.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/offices/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\OfficesController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\OfficesController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/offices',
        'where' => 
        array (
        ),
        'as' => 'backend.offices.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.offices.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/offices/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\OfficesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\OfficesController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/offices',
        'where' => 
        array (
        ),
        'as' => 'backend.offices.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.offices.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/offices/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\OfficesController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\OfficesController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/offices',
        'where' => 
        array (
        ),
        'as' => 'backend.offices.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.offices.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/offices/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\OfficesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\OfficesController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/offices',
        'where' => 
        array (
        ),
        'as' => 'backend.offices.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.slides.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/slides',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SlidesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\SlidesController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/slides',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.slides.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.slides.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/slides/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SlidesController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\SlidesController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/slides',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.slides.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.slides.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/slides/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SlidesController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\SlidesController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/slides',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.slides.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.slides.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/slides/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SlidesController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\SlidesController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/slides',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.slides.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.slides.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/slides/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SlidesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\SlidesController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/slides',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.slides.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.slides.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/slides/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SlidesController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\SlidesController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/slides',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.slides.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.slides.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/slides/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SlidesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\SlidesController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/slides',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.slides.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.actions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/actions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionsController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/actions',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.actions.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.actions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/actions/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionsController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionsController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/actions',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.actions.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.actions.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/actions/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionsController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/actions',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.actions.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.actions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/actions/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionsController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/actions',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.actions.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.actions.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/actions/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionsController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/actions',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.actions.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.actions.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/actions/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionsController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionsController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/actions',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.actions.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.actions.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/actions/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionsController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/actions',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.actions.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.testimonials.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/testimonials',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/testimonials',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.testimonials.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.testimonials.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/testimonials/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/testimonials',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.testimonials.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.testimonials.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/testimonials/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/testimonials',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.testimonials.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.testimonials.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/testimonials/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/testimonials',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.testimonials.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.testimonials.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/testimonials/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/testimonials',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.testimonials.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.testimonials.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/testimonials/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/testimonials',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.testimonials.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.testimonials.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/testimonials/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\TestimonialsController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/testimonials',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.testimonials.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.partners.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/partners',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PartnersController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\PartnersController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/partners',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.partners.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.partners.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/partners/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PartnersController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\PartnersController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/partners',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.partners.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.partners.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/partners/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PartnersController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\PartnersController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/partners',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.partners.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.partners.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/partners/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PartnersController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\PartnersController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/partners',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.partners.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.partners.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/partners/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PartnersController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\PartnersController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/partners',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.partners.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.partners.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/partners/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PartnersController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\PartnersController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/partners',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.partners.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.partners.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/partners/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PartnersController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\PartnersController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/partners',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.partners.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.action-lines.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/action-lines',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/action-lines',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.action-lines.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.action-lines.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/action-lines/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/action-lines',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.action-lines.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.action-lines.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/action-lines/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/action-lines',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.action-lines.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.action-lines.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/action-lines/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/action-lines',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.action-lines.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.action-lines.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/action-lines/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/action-lines',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.action-lines.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.action-lines.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/action-lines/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/action-lines',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.action-lines.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.action-lines.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/action-lines/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionLinesController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/action-lines',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.action-lines.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.teams.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/teams',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TeamsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\TeamsController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/teams',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.teams.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.teams.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/teams/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TeamsController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\TeamsController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/teams',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.teams.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.teams.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/teams/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TeamsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\TeamsController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/teams',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.teams.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.teams.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/teams/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TeamsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\TeamsController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/teams',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.teams.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.teams.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/teams/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TeamsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\TeamsController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/teams',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.teams.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.teams.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/teams/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TeamsController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\TeamsController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/teams',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.teams.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.teams.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/teams/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TeamsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\TeamsController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/teams',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.teams.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.reports.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ReportsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReportsController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/reports',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.reports.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.reports.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/reports/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ReportsController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReportsController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/reports',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.reports.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.reports.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/reports/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ReportsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReportsController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/reports',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.reports.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.reports.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/reports/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ReportsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReportsController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/reports',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.reports.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.reports.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/reports/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ReportsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReportsController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/reports',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.reports.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.reports.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/reports/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ReportsController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReportsController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/reports',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.reports.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.reports.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/reports/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ReportsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReportsController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/reports',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.reports.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.reports.trash-file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/reports/trash-file/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ReportsController@trashFile',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReportsController@trashFile',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/reports',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.reports.trash-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.abouts.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/abouts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AboutsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\AboutsController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/abouts',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.abouts.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.abouts.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/abouts/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AboutsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\AboutsController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/abouts',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.abouts.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.definitions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/definitions-global',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\DefinitionsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\DefinitionsController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/definitions-global',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.definitions.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.definitions.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/definitions-global/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\DefinitionsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\DefinitionsController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/definitions-global',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.definitions.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.newsletter.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/newsletter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\NewsletterController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\NewsletterController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/newsletter',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.newsletter.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.newsletter.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/newsletter/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\NewsletterController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\NewsletterController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/newsletter',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.newsletter.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.newsletter.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/newsletter/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\NewsletterController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\NewsletterController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/newsletter',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.newsletter.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.newsletter.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/newsletter/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\NewsletterController@export',
        'controller' => 'App\\Http\\Controllers\\Backend\\NewsletterController@export',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/newsletter',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.newsletter.export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.posts-instagram.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/posts-instagram',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@index',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/posts-instagram',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.posts-instagram.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.posts-instagram.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/posts-instagram/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@create',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/posts-instagram',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.posts-instagram.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.posts-instagram.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/posts-instagram/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@store',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/posts-instagram',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.posts-instagram.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.posts-instagram.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/posts-instagram/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@show',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/posts-instagram',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.posts-instagram.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.posts-instagram.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sys/app/frontend/posts-instagram/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@update',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/posts-instagram',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.posts-instagram.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.posts-instagram.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/posts-instagram/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@status',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@status',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/posts-instagram',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.posts-instagram.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backend.frontend.posts-instagram.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/app/frontend/posts-instagram/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'is.system',
          2 => 'checkStatus',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsIntagramController@destroy',
        'namespace' => 'Backend',
        'prefix' => 'sys/app/frontend/posts-instagram',
        'where' => 
        array (
        ),
        'as' => 'backend.frontend.posts-instagram.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::muMdkODGyR9JGt0M' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sys/view/{path}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ViewController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ViewController@index',
        'namespace' => 'Backend',
        'prefix' => '/sys',
        'where' => 
        array (
        ),
        'as' => 'generated::muMdkODGyR9JGt0M',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
