<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Tests Routes
|--------------------------------------------------------------------------
*/

Route::namespace("Tests")->prefix('testings')->group(function () {
    Route::get('/', [App\Http\Controllers\Test\TestController::class, 'index'])->name('tests.index');
});

Route::get('/clear-cache', function() {
   $exitCode = Artisan::call('cache:clear');
   $exitCode = Artisan::call('route:cache');
   // return what you want
});

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::namespace("Frontend")->group(function () {

    # Home
    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('frontend.home');

    # Actions
    Route::get('/acoes', [App\Http\Controllers\Frontend\ActionsController::class, 'index'])->name('frontend.actions');
    Route::get('/acao/{id}/{slug}', [App\Http\Controllers\Frontend\ActionsController::class, 'show'])->name('frontend.actions.show');

    # Abouts
    Route::get('/instituto', [App\Http\Controllers\Frontend\AboutsController::class, 'index'])->name('frontend.abouts');

    # Contact
    Route::get('/contato', [App\Http\Controllers\Frontend\ContactsController::class, 'index'])->name('frontend.contacts');

    # Partners
    Route::get('/parceiros', [App\Http\Controllers\Frontend\PartnersController::class, 'index'])->name('frontend.partners');

    # Reports
    Route::get('/relatorios', [App\Http\Controllers\Frontend\ReportsController::class, 'index'])->name('frontend.reports');
    Route::get('/relatorio/{id}/{slug}', [App\Http\Controllers\Frontend\ReportsController::class, 'show'])->name('frontend.reports.show');

    # Units
    Route::get('/polos', [App\Http\Controllers\Frontend\UnitsController::class, 'index'])->name('frontend.units');
    Route::get('/polo/{id}/{slug}', [App\Http\Controllers\Frontend\UnitsController::class, 'show'])->name('frontend.units.show');

    # Programs
    Route::get('/programas', [App\Http\Controllers\Frontend\ProgramsController::class, 'index'])->name('frontend.programs');
    Route::get('/programa/{id}/{slug}', [App\Http\Controllers\Frontend\ProgramsController::class, 'show'])->name('frontend.programs.show');

    # Action Lines
    Route::get('/linhas-de-acao', [App\Http\Controllers\Frontend\ActionLinesController::class, 'index'])->name('frontend.action-lines');

    # Downloads
    Route::get('/download/generate/{file}/{path}', [App\Http\Controllers\Frontend\DownloadsController::class, 'download'])->name('frontend.download.file');

    # Newsletter
    Route::post('/newsletter', [App\Http\Controllers\Frontend\NewsletterController::class, 'save'])->name('frontend.newsletter.save');

    # Send Forms
    Route::post('/send/{type}', [App\Http\Controllers\Frontend\FormsController::class, 'send'])->name('frontend.forms.send');



    Route::get('reload-captcha', [App\Http\Controllers\Frontend\FormsController::class, 'reloadCaptcha'])->name('site-reload-captcha');
});

/*
|--------------------------------------------------------------------------
| Backend System Routes
|--------------------------------------------------------------------------
*/

Route::namespace("Backend")->prefix('sys')->group(function () {



    Route::get('/', [App\Http\Controllers\Backend\AuthController::class, 'login'])->name('backend.login');
    Route::post('/', [App\Http\Controllers\Backend\AuthController::class, 'auth'])->name('backend.login.auth');
    Route::get('/recuperar-senha', [App\Http\Controllers\Backend\AuthController::class, 'forgot'])->name('backend.login.forgot');
    Route::post('/recuperar-senha/resquest', [App\Http\Controllers\Backend\AuthController::class, 'forgotRequest'])->name('backend.login.forgot.request');
    Route::get('reset-password/{token}', [App\Http\Controllers\Backend\AuthController::class, 'showResetPasswordForm'])->name('backend.login.forgot.password.get');
    Route::post('reset-password/submit', [App\Http\Controllers\Backend\AuthController::class, 'submitResetPasswordForm'])->name('backend.login.forgot.password.submit');


    Route::get('/access/{token}', [App\Http\Controllers\Backend\AuthController::class, 'token'])->name('backend.login.token');


    Route::prefix('app')->middleware(['is.system', 'checkStatus'])->group(function () {

        # Logout
        Route::get('/logout', [App\Http\Controllers\Backend\AuthController::class, 'logout'])->name('backend.auth.logout');

        # Dashboard
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('backend.dashboard');
            Route::get('/metrics/{type}', [App\Http\Controllers\Backend\DashboardController::class, 'metrics'])->name('api.dashboard');
        });
        # Profile
        Route::prefix('profile')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\ProfileController::class, 'index'])->name('backend.profile');
            Route::post('/update', [App\Http\Controllers\Backend\ProfileController::class, 'update'])->name('backend.profile.update');
        });

        # Users
        Route::prefix('users')->middleware(['role:admin'])->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\UsersController::class, 'index'])->name('backend.users.index');
            Route::get('/create', [App\Http\Controllers\Backend\UsersController::class, 'create'])->name('backend.users.create');
            Route::post('/store', [App\Http\Controllers\Backend\UsersController::class, 'store'])->name('backend.users.store');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\UsersController::class, 'show'])->name('backend.users.show');
            Route::post('/update/{id}', [App\Http\Controllers\Backend\UsersController::class, 'update'])->name('backend.users.update');
            Route::get('/status/{id}', [App\Http\Controllers\Backend\UsersController::class, 'status'])->name('backend.users.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Backend\UsersController::class, 'destroy'])->name('backend.users.delete');
            # ReSend Link to Email
            Route::get('/send-link/{id}', [App\Http\Controllers\Backend\UsersController::class, 'sendLink'])->name('backend.users.send-link');
            
            # ReSend Link to Email
            Route::get('/generate/record/{id}', [App\Http\Controllers\Backend\UsersController::class, 'record'])->name('backend.users.record');
        });

        # Group Users
        Route::prefix('group-users')->middleware(['role:admin'])->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\GroupUsersController::class, 'index'])->name('backend.group.users.index');
            Route::get('/create', [App\Http\Controllers\Backend\GroupUsersController::class, 'create'])->name('backend.group.users.create');
            Route::post('/store', [App\Http\Controllers\Backend\GroupUsersController::class, 'store'])->name('backend.group.users.store');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\GroupUsersController::class, 'show'])->name('backend.group.users.show');
            Route::post('/update/{id}', [App\Http\Controllers\Backend\GroupUsersController::class, 'update'])->name('backend.group.users.update');
            Route::get('/status/{id}', [App\Http\Controllers\Backend\GroupUsersController::class, 'status'])->name('backend.group.users.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Backend\GroupUsersController::class, 'destroy'])->name('backend.group.users.delete');
        });

        # Users
        Route::prefix('sexes')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\SexesController::class, 'index'])->name('backend.sexes.index');
            Route::get('/create', [App\Http\Controllers\Backend\SexesController::class, 'create'])->name('backend.sexes.create');
            Route::post('/store', [App\Http\Controllers\Backend\SexesController::class, 'store'])->name('backend.sexes.store');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\SexesController::class, 'show'])->name('backend.sexes.show');
            Route::post('/update/{id}', [App\Http\Controllers\Backend\SexesController::class, 'update'])->name('backend.sexes.update');
            Route::get('/status/{id}', [App\Http\Controllers\Backend\SexesController::class, 'status'])->name('backend.sexes.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Backend\SexesController::class, 'destroy'])->name('backend.sexes.delete');
        });

        # Countries
        Route::prefix('countries')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\CountriesController::class, 'index'])->name('backend.countries.index');
            Route::get('/create', [App\Http\Controllers\Backend\CountriesController::class, 'create'])->name('backend.countries.create');
            Route::post('/store', [App\Http\Controllers\Backend\CountriesController::class, 'store'])->name('backend.countries.store');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\CountriesController::class, 'show'])->name('backend.countries.show');
            Route::post('/update/{id}', [App\Http\Controllers\Backend\CountriesController::class, 'update'])->name('backend.countries.update');
            Route::get('/status/{id}', [App\Http\Controllers\Backend\CountriesController::class, 'status'])->name('backend.countries.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Backend\CountriesController::class, 'destroy'])->name('backend.countries.delete');
        });

        # States
        Route::prefix('states')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\StatesController::class, 'index'])->name('backend.states.index');
            Route::get('/create', [App\Http\Controllers\Backend\StatesController::class, 'create'])->name('backend.states.create');
            Route::post('/store', [App\Http\Controllers\Backend\StatesController::class, 'store'])->name('backend.states.store');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\StatesController::class, 'show'])->name('backend.states.show');
            Route::post('/update/{id}', [App\Http\Controllers\Backend\StatesController::class, 'update'])->name('backend.states.update');
            Route::get('/status/{id}', [App\Http\Controllers\Backend\StatesController::class, 'status'])->name('backend.states.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Backend\StatesController::class, 'destroy'])->name('backend.states.delete');
        });

        # Cities
        Route::prefix('cities')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\CitiesController::class, 'index'])->name('backend.cities.index');
            Route::get('/create', [App\Http\Controllers\Backend\CitiesController::class, 'create'])->name('backend.cities.create');
            Route::post('/store', [App\Http\Controllers\Backend\CitiesController::class, 'store'])->name('backend.cities.store');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\CitiesController::class, 'show'])->name('backend.cities.show');
            Route::post('/update/{id}', [App\Http\Controllers\Backend\CitiesController::class, 'update'])->name('backend.cities.update');
            Route::get('/status/{id}', [App\Http\Controllers\Backend\CitiesController::class, 'status'])->name('backend.cities.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Backend\CitiesController::class, 'destroy'])->name('backend.cities.delete');
        });

        # Poles
        Route::prefix('units')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\UnitsController::class, 'index'])->name('backend.units.index');
            Route::get('/create', [App\Http\Controllers\Backend\UnitsController::class, 'create'])->name('backend.units.create');
            Route::post('/store', [App\Http\Controllers\Backend\UnitsController::class, 'store'])->name('backend.units.store');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\UnitsController::class, 'show'])->name('backend.units.show');
            Route::post('/update/{id}', [App\Http\Controllers\Backend\UnitsController::class, 'update'])->name('backend.units.update');
            Route::get('/status/{id}', [App\Http\Controllers\Backend\UnitsController::class, 'status'])->name('backend.units.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Backend\UnitsController::class, 'destroy'])->name('backend.units.delete');
        });


        # Poles
        Route::prefix('classes')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\ClassesController::class, 'index'])->name('backend.classes.index');
            Route::get('/create', [App\Http\Controllers\Backend\ClassesController::class, 'create'])->name('backend.classes.create');
            Route::post('/store', [App\Http\Controllers\Backend\ClassesController::class, 'store'])->name('backend.classes.store');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\ClassesController::class, 'show'])->name('backend.classes.show');
            Route::post('/update/{id}', [App\Http\Controllers\Backend\ClassesController::class, 'update'])->name('backend.classes.update');
            Route::get('/status/{id}', [App\Http\Controllers\Backend\ClassesController::class, 'status'])->name('backend.classes.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Backend\ClassesController::class, 'destroy'])->name('backend.classes.delete');
        });

        # Schools
        Route::prefix('schools')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\SchoolsController::class, 'index'])->name('backend.schools.index');
            Route::get('/create', [App\Http\Controllers\Backend\SchoolsController::class, 'create'])->name('backend.schools.create');
            Route::post('/store', [App\Http\Controllers\Backend\SchoolsController::class, 'store'])->name('backend.schools.store');
            Route::post('/update/{id}', [App\Http\Controllers\Backend\SchoolsController::class, 'update'])->name('backend.schools.update');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\SchoolsController::class, 'show'])->name('backend.schools.show');
            Route::get('/status/{id}', [App\Http\Controllers\Backend\SchoolsController::class, 'status'])->name('backend.schools.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Backend\SchoolsController::class, 'destroy'])->name('backend.schools.delete');
        });


        # Researches
        Route::prefix('researches')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\ResearchesController::class, 'index'])->name('backend.researches.index');
            // Route::get('/create', [App\Http\Controllers\Backend\ResearchesController::class, 'create'])->name('backend.researches.create');
            // Route::post('/store', [App\Http\Controllers\Backend\ResearchesController::class, 'store'])->name('backend.researches.store');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\ResearchesController::class, 'show'])->name('backend.researches.show');
            Route::post('/update/{id}', [App\Http\Controllers\Backend\ResearchesController::class, 'update'])->name('backend.researches.update');

            Route::get('/imprimir/{id}', [App\Http\Controllers\Backend\ResearchesController::class, 'print'])->name('backend.researches.print');

            Route::prefix('export')->group(function () {
                Route::get('/generate/{type}', [App\Http\Controllers\Backend\ResearchesController::class, 'export'])->name('backend.researches.export');
            });

            Route::prefix('api')->group(function () {
                Route::get('/req/{type}', [App\Http\Controllers\Backend\ResearchesController::class, 'api'])->name('backend.researches.api');
            });

            Route::post('/update/institutional/{institutional_id}', [App\Http\Controllers\Backend\ResearchesController::class, 'institutional'])->name('backend.researches-institutional.update');
            // Route::get('/status/{id}', [App\Http\Controllers\Backend\ResearchesController::class, 'status'])->name('backend.researches.status');
            // Route::get('/delete/{id}', [App\Http\Controllers\Backend\ResearchesController::class, 'destroy'])->name('backend.researches.delete');
        });

        # Students
       
		 Route::prefix('students')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\StudentsController::class, 'index'])->name('backend.students.index');
            Route::get('/create', [App\Http\Controllers\Backend\StudentsController::class, 'create'])->name('backend.students.create');
            Route::post('/store', [App\Http\Controllers\Backend\StudentsController::class, 'store'])->name('backend.students.store');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\StudentsController::class, 'show'])->name('backend.students.show');
			
            Route::any('/update/{id}', [App\Http\Controllers\Backend\StudentsController::class, 'update'])->name('backend.students.update');
           
            # Generate Record
            Route::get('/record/{id}', [App\Http\Controllers\Backend\StudentsController::class, 'record'])->name('backend.students.record');

            # Transfer
            Route::post('/transfer/{id}', [App\Http\Controllers\Backend\StudentsController::class, 'transfer'])->name('backend.students.transfer');
           
            Route::get('/status/{id}', [App\Http\Controllers\Backend\StudentsController::class, 'status'])->name('backend.students.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Backend\StudentsController::class, 'destroy'])->name('backend.students.delete');

            Route::prefix('export')->group(function () {
                Route::get('/generate/{type}', [App\Http\Controllers\Backend\StudentsController::class, 'export'])->name('backend.students.export');
            });
        });

        # Programs
        Route::prefix('programs')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\ProgramsController::class, 'index'])->name('backend.programs.index');
            Route::get('/create', [App\Http\Controllers\Backend\ProgramsController::class, 'create'])->name('backend.programs.create');
            Route::post('/store', [App\Http\Controllers\Backend\ProgramsController::class, 'store'])->name('backend.programs.store');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\ProgramsController::class, 'show'])->name('backend.programs.show');
            Route::post('/update/{id}', [App\Http\Controllers\Backend\ProgramsController::class, 'update'])->name('backend.programs.update');
            Route::get('/status/{id}', [App\Http\Controllers\Backend\ProgramsController::class, 'status'])->name('backend.programs.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Backend\ProgramsController::class, 'destroy'])->name('backend.programs.delete');
        });

        # Annotations
        Route::prefix('annotations')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\AnnotationsController::class, 'index'])->name('backend.annotations.index');
            Route::get('/create', [App\Http\Controllers\Backend\AnnotationsController::class, 'create'])->name('backend.annotations.create');
            Route::post('/store', [App\Http\Controllers\Backend\AnnotationsController::class, 'store'])->name('backend.annotations.store');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\AnnotationsController::class, 'show'])->name('backend.annotations.show');
            Route::post('/update/{id}', [App\Http\Controllers\Backend\AnnotationsController::class, 'update'])->name('backend.annotations.update');
            Route::get('/status/{id}', [App\Http\Controllers\Backend\AnnotationsController::class, 'status'])->name('backend.annotations.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Backend\AnnotationsController::class, 'destroy'])->name('backend.annotations.delete');
        });


        # API
        Route::prefix('api')->group(function () {
            Route::prefix('classes')->group(function () {
                Route::get('/units', [App\Http\Controllers\Api\ClassesController::class, 'units'])->name('backend.api.classes.units');
                Route::get('/program/{unit_id?}', [App\Http\Controllers\Api\ClassesController::class, 'programs'])->name('backend.api.classes.programs');
                Route::get('/classes/{program_id?}/{unit_id?}', [App\Http\Controllers\Api\ClassesController::class, 'classes'])->name('backend.api.classes.classes');
            });

            Route::prefix('archives')->group(function () {
                Route::get('/get/{entity}/{entity_id?}', [App\Http\Controllers\Api\ArchivesController::class, 'get'])->name('backend.api.archives.get');
                Route::post('/upload/{entity}/{entity_id?}', [App\Http\Controllers\Api\ArchivesController::class, 'send'])->name('backend.api.archives.send');
                Route::delete('/destroy/{id?}', [App\Http\Controllers\Api\ArchivesController::class, 'destroy'])->name('backend.api.archives.destroy');
            });

            Route::prefix('schools')->group(function () {
                Route::get('/years/{type?}', [App\Http\Controllers\Api\SchoolsController::class, 'get'])->name('backend.api.schools.get');
            });
        });



        # Offices
        Route::prefix('offices')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\OfficesController::class, 'index'])->name('backend.offices.index');
            Route::get('/create', [App\Http\Controllers\Backend\OfficesController::class, 'create'])->name('backend.offices.create');
            Route::post('/store', [App\Http\Controllers\Backend\OfficesController::class, 'store'])->name('backend.offices.store');
            Route::get('/show/{id}', [App\Http\Controllers\Backend\OfficesController::class, 'show'])->name('backend.offices.show');
            Route::post('/update/{id}', [App\Http\Controllers\Backend\OfficesController::class, 'update'])->name('backend.offices.update');
            Route::get('/status/{id}', [App\Http\Controllers\Backend\OfficesController::class, 'status'])->name('backend.offices.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Backend\OfficesController::class, 'destroy'])->name('backend.offices.delete');
        });



        # Site/Frontend
        Route::prefix('frontend')->middleware(['role:admin'])->group(function () {

            # Slides
            Route::prefix('slides')->group(function () {
                Route::get('/', [App\Http\Controllers\Backend\SlidesController::class, 'index'])->name('backend.frontend.slides.index');
                Route::get('/create', [App\Http\Controllers\Backend\SlidesController::class, 'create'])->name('backend.frontend.slides.create');
                Route::post('/store', [App\Http\Controllers\Backend\SlidesController::class, 'store'])->name('backend.frontend.slides.store');
                Route::get('/show/{id}', [App\Http\Controllers\Backend\SlidesController::class, 'show'])->name('backend.frontend.slides.show');
                Route::post('/update/{id}', [App\Http\Controllers\Backend\SlidesController::class, 'update'])->name('backend.frontend.slides.update');
                Route::get('/status/{id}', [App\Http\Controllers\Backend\SlidesController::class, 'status'])->name('backend.frontend.slides.status');
                Route::get('/delete/{id}', [App\Http\Controllers\Backend\SlidesController::class, 'destroy'])->name('backend.frontend.slides.delete');
            });

            # Actions
            Route::prefix('actions')->group(function () {
                Route::get('/', [App\Http\Controllers\Backend\ActionsController::class, 'index'])->name('backend.frontend.actions.index');
                Route::get('/create', [App\Http\Controllers\Backend\ActionsController::class, 'create'])->name('backend.frontend.actions.create');
                Route::post('/store', [App\Http\Controllers\Backend\ActionsController::class, 'store'])->name('backend.frontend.actions.store');
                Route::get('/show/{id}', [App\Http\Controllers\Backend\ActionsController::class, 'show'])->name('backend.frontend.actions.show');
                Route::post('/update/{id}', [App\Http\Controllers\Backend\ActionsController::class, 'update'])->name('backend.frontend.actions.update');
                Route::get('/status/{id}', [App\Http\Controllers\Backend\ActionsController::class, 'status'])->name('backend.frontend.actions.status');
                Route::get('/delete/{id}', [App\Http\Controllers\Backend\ActionsController::class, 'destroy'])->name('backend.frontend.actions.delete');
            });

            # Testimonials
            Route::prefix('testimonials')->group(function () {
                Route::get('/', [App\Http\Controllers\Backend\TestimonialsController::class, 'index'])->name('backend.frontend.testimonials.index');
                Route::get('/create', [App\Http\Controllers\Backend\TestimonialsController::class, 'create'])->name('backend.frontend.testimonials.create');
                Route::post('/store', [App\Http\Controllers\Backend\TestimonialsController::class, 'store'])->name('backend.frontend.testimonials.store');
                Route::get('/show/{id}', [App\Http\Controllers\Backend\TestimonialsController::class, 'show'])->name('backend.frontend.testimonials.show');
                Route::post('/update/{id}', [App\Http\Controllers\Backend\TestimonialsController::class, 'update'])->name('backend.frontend.testimonials.update');
                Route::get('/status/{id}', [App\Http\Controllers\Backend\TestimonialsController::class, 'status'])->name('backend.frontend.testimonials.status');
                Route::get('/delete/{id}', [App\Http\Controllers\Backend\TestimonialsController::class, 'destroy'])->name('backend.frontend.testimonials.delete');
            });


            # Partners
            Route::prefix('partners')->group(function () {
                Route::get('/', [App\Http\Controllers\Backend\PartnersController::class, 'index'])->name('backend.frontend.partners.index');
                Route::get('/create', [App\Http\Controllers\Backend\PartnersController::class, 'create'])->name('backend.frontend.partners.create');
                Route::post('/store', [App\Http\Controllers\Backend\PartnersController::class, 'store'])->name('backend.frontend.partners.store');
                Route::get('/show/{id}', [App\Http\Controllers\Backend\PartnersController::class, 'show'])->name('backend.frontend.partners.show');
                Route::post('/update/{id}', [App\Http\Controllers\Backend\PartnersController::class, 'update'])->name('backend.frontend.partners.update');
                Route::get('/status/{id}', [App\Http\Controllers\Backend\PartnersController::class, 'status'])->name('backend.frontend.partners.status');
                Route::get('/delete/{id}', [App\Http\Controllers\Backend\PartnersController::class, 'destroy'])->name('backend.frontend.partners.delete');
            });


            # Action Lines
            Route::prefix('action-lines')->group(function () {
                Route::get('/', [App\Http\Controllers\Backend\ActionLinesController::class, 'index'])->name('backend.frontend.action-lines.index');
                Route::get('/create', [App\Http\Controllers\Backend\ActionLinesController::class, 'create'])->name('backend.frontend.action-lines.create');
                Route::post('/store', [App\Http\Controllers\Backend\ActionLinesController::class, 'store'])->name('backend.frontend.action-lines.store');
                Route::get('/show/{id}', [App\Http\Controllers\Backend\ActionLinesController::class, 'show'])->name('backend.frontend.action-lines.show');
                Route::post('/update/{id}', [App\Http\Controllers\Backend\ActionLinesController::class, 'update'])->name('backend.frontend.action-lines.update');
                Route::get('/status/{id}', [App\Http\Controllers\Backend\ActionLinesController::class, 'status'])->name('backend.frontend.action-lines.status');
                Route::get('/delete/{id}', [App\Http\Controllers\Backend\ActionLinesController::class, 'destroy'])->name('backend.frontend.action-lines.delete');
            });


            # Teams
            Route::prefix('teams')->group(function () {
                Route::get('/', [App\Http\Controllers\Backend\TeamsController::class, 'index'])->name('backend.frontend.teams.index');
                Route::get('/create', [App\Http\Controllers\Backend\TeamsController::class, 'create'])->name('backend.frontend.teams.create');
                Route::post('/store', [App\Http\Controllers\Backend\TeamsController::class, 'store'])->name('backend.frontend.teams.store');
                Route::get('/show/{id}', [App\Http\Controllers\Backend\TeamsController::class, 'show'])->name('backend.frontend.teams.show');
                Route::post('/update/{id}', [App\Http\Controllers\Backend\TeamsController::class, 'update'])->name('backend.frontend.teams.update');
                Route::get('/status/{id}', [App\Http\Controllers\Backend\TeamsController::class, 'status'])->name('backend.frontend.teams.status');
                Route::get('/delete/{id}', [App\Http\Controllers\Backend\TeamsController::class, 'destroy'])->name('backend.frontend.teams.delete');
            });

            # Reports
            Route::prefix('reports')->group(function () {
                Route::get('/', [App\Http\Controllers\Backend\ReportsController::class, 'index'])->name('backend.frontend.reports.index');
                Route::get('/create', [App\Http\Controllers\Backend\ReportsController::class, 'create'])->name('backend.frontend.reports.create');
                Route::post('/store', [App\Http\Controllers\Backend\ReportsController::class, 'store'])->name('backend.frontend.reports.store');
                Route::get('/show/{id}', [App\Http\Controllers\Backend\ReportsController::class, 'show'])->name('backend.frontend.reports.show');
                Route::post('/update/{id}', [App\Http\Controllers\Backend\ReportsController::class, 'update'])->name('backend.frontend.reports.update');
                Route::get('/status/{id}', [App\Http\Controllers\Backend\ReportsController::class, 'status'])->name('backend.frontend.reports.status');
                Route::get('/delete/{id}', [App\Http\Controllers\Backend\ReportsController::class, 'destroy'])->name('backend.frontend.reports.delete');

                Route::get('/trash-file/{id}', [App\Http\Controllers\Backend\ReportsController::class, 'trashFile'])->name('backend.frontend.reports.trash-file');
            });

            # Abouts
            Route::prefix('abouts')->group(function () {
                Route::get('/', [App\Http\Controllers\Backend\AboutsController::class, 'show'])->name('backend.frontend.abouts.show');
                Route::post('/update', [App\Http\Controllers\Backend\AboutsController::class, 'update'])->name('backend.frontend.abouts.update');
            });

            # Definitions
            Route::prefix('definitions-global')->group(function () {
                Route::get('/', [App\Http\Controllers\Backend\DefinitionsController::class, 'show'])->name('backend.frontend.definitions.show');
                Route::post('/update', [App\Http\Controllers\Backend\DefinitionsController::class, 'update'])->name('backend.frontend.definitions.update');
            });


            # Newsletter
            Route::prefix('newsletter')->group(function () {
                Route::get('/', [App\Http\Controllers\Backend\NewsletterController::class, 'index'])->name('backend.frontend.newsletter.index');
                Route::get('/status/{id}', [App\Http\Controllers\Backend\NewsletterController::class, 'status'])->name('backend.frontend.newsletter.status');
                Route::get('/delete/{id}', [App\Http\Controllers\Backend\NewsletterController::class, 'destroy'])->name('backend.frontend.newsletter.delete');
                Route::get('/export', [App\Http\Controllers\Backend\NewsletterController::class, 'export'])->name('backend.frontend.newsletter.export');
            });


            # Testimonials
            Route::prefix('posts-instagram')->group(function () {
                Route::get('/', [App\Http\Controllers\Backend\PostsIntagramController::class, 'index'])->name('backend.frontend.posts-instagram.index');
                Route::get('/create', [App\Http\Controllers\Backend\PostsIntagramController::class, 'create'])->name('backend.frontend.posts-instagram.create');
                Route::post('/store', [App\Http\Controllers\Backend\PostsIntagramController::class, 'store'])->name('backend.frontend.posts-instagram.store');
                Route::get('/show/{id}', [App\Http\Controllers\Backend\PostsIntagramController::class, 'show'])->name('backend.frontend.posts-instagram.show');
                Route::post('/update/{id}', [App\Http\Controllers\Backend\PostsIntagramController::class, 'update'])->name('backend.frontend.posts-instagram.update');
                Route::get('/status/{id}', [App\Http\Controllers\Backend\PostsIntagramController::class, 'status'])->name('backend.frontend.posts-instagram.status');
                Route::get('/delete/{id}', [App\Http\Controllers\Backend\PostsIntagramController::class, 'destroy'])->name('backend.frontend.posts-instagram.delete');
            });
        });
    });


    Route::get('/view/{path}', [App\Http\Controllers\Backend\ViewController::class, 'index']);
});
