<?php

use Illuminate\Support\Facades\Route;

// Added
// Admin
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\RolePermissionController as AdminRoleController;
use App\Http\Controllers\Admin\CandidateController as AdminCandidateController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use App\Http\Controllers\Admin\JobVacancyController as AdminJobVacancyController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\CoinLogController as AdminCoinLogController;

// Mitra
use App\Http\Controllers\Mitra\PageController as MitraPageController;
use App\Http\Controllers\Mitra\JobVacancyController as MitraLowonganController;
use App\Http\Controllers\Mitra\JobCondidateController as MitraJobCandidateController;
use App\Http\Controllers\Mitra\JobPelamarController as MitraJobPelamarController;

// Candidate
use App\Http\Controllers\Candidate\PageController as CandidatePageController;
use App\Http\Controllers\Candidate\JobVacancyController as CandidateJobVacancyController;

// Member
use App\Http\Controllers\User\CandidateController as UserCandidateController;
use App\Http\Controllers\User\PartnerController as UserPartnerController;
use App\Http\Controllers\User\UserControlPanelController as UserCPController;

// Public
use App\Http\Controllers\Public\HomeController as PublicHomeController;
use App\Http\Controllers\Public\ArticleController as PublicArticleController;
use App\Http\Controllers\Public\JobVacancyController as PublicLowonganController;
use App\http\Controllers\Public\ContactController as PublicContactController;
use App\Http\Controllers\Public\MitraProfileController as PublicMitraProfileController;

// Finance
use App\Http\Controllers\Finance\DashboardFinanceController;
use App\Http\Controllers\Finance\EditHargaController;
use App\Http\Controllers\Finance\FinanceActivityController;
use FontLib\Table\Type\name;

require_once __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::middleware('verified')->group(function () {

        Route::get('/daftar/mitra', function () {
            return redirect()->route('member.daftar.mitra.index');
        })->name('daftar.mitra');
        Route::get('/daftar/kandidat', function () {
            return redirect()->route('member.daftar.kandidat.index');
        })->name('daftar.kandidat');

        Route::prefix('admin-cp')->name('admin')->middleware('permission:access-admincp')->group(function () {
            Route::any('/', function () {
                return redirect()->route('admin.dashboard');
            })->name('.cp');
            Route::controller(AdminPageController::class)->group(function () {
                Route::get('/dashboard', 'dashboard')->name('.dashboard');
            });
            // Manage Article (CRUD)
            Route::controller(AdminArticleController::class)->name('.article')->group(function () {
                Route::get('/articles', 'index')->name('.index');
                Route::prefix('/article')->group(function () {
                    Route::get('/new', 'create')->name('.create');
                    Route::post('/new', 'store')->name('.store');
                    // Route::get('/show/{article:id}', 'show')->name('.show');
                    Route::get('/edit/{article:id}', 'edit')->name('.edit');
                    Route::put('/edit/{article:id}', 'update')->name('.update');
                    Route::delete('/delete/{article:id}', 'destroy')->name('.destroy');
                });
            });
            // Manage User
            Route::controller(AdminUserController::class)->name('.user')->group(function () {
                Route::get('/users', 'index')->name('.index');
                Route::prefix('/user')->group(function () {
                    Route::get('/edit/{user:id}', 'edit')->name('.edit');
                    Route::put('/edit/{user:id}/photo', 'updatePhoto')->name('.update.photo');
                    Route::put('/edit/{user:id}/information', 'updateInformation')->name('.update.information');
                    Route::get('/edit/{id}/role', function ($id) {
                        return abort(404);
                    });
                    Route::put('/edit/{user:id}/role', 'updateRole')->name('.update.role');
                });
            });
            // Manage Roles
            Route::controller(AdminRoleController::class)->name('.role')->group(function () {
                Route::get('/roles', 'index')->name('.index');
                Route::prefix('/role')->group(function () {
                    Route::get('/create', 'create')->name('.create');
                    Route::post('/create', 'store')->name('.store');
                    Route::get('/edit/{role:id}', 'edit')->name('.edit');
                    Route::put('/edit/{role:id}', 'update')->name('.update');
                    Route::post('/edit/{role:id}/sync', 'syncPermissions')->name('.permission.sync');
                    Route::delete('/edit/{role:id}/delete', 'destroy')->name('.destroy');
                });
            });
            // Manage Candidates
            Route::controller(AdminCandidateController::class)->name('.candidate')->group(function () {
                Route::get('/candidates', 'index')->name('.index');
                Route::prefix('/candidate')->group(function () {
                    Route::get('/show/{candidate:id}', 'show')->name('.show');
                    Route::get('/edit/{candidate:id}', 'edit')->name('.edit');
                    Route::put('/edit/{candidate:id}', 'update')->name('.update');
                    Route::delete('/destroy/{candidate:id}', 'destroy')->name('.destroy');
                    Route::patch('/accept/{candidate:id}', 'acceptPreCandidate')->name('.acceptPreCandidate');
                    Route::patch('/reject/{candidate:id}', 'rejectPreCandidate')->name('.rejectPreCandidate');
                });
            });
            // Manage Partners
            Route::controller(AdminPartnerController::class)->name('.partner')->group(function () {
                Route::get('/partners', 'index')->name('.index');
                Route::prefix('/partner')->group(function () {
                    Route::get('/show/{partner:id}', 'show')->name('.show');
                    Route::get('/edit/{partner:id}', 'edit')->name('.edit');
                    Route::put('/edit/{partner:id}', 'update')->name('.update');
                    Route::delete('/destroy/{partner:id}', 'destroy')->name('.destroy');
                    Route::patch('/accept/{partner:id}', 'acceptPrePartner')->name('.acceptPrePartner');
                    Route::patch('/reject/{partner:id}', 'rejectPrePartner')->name('.rejectPrePartner');
                });
            });
            // Manage Job Vacancies
            Route::controller(AdminJobVacancyController::class)->name('.lowongan')->group(function () {
                Route::get('/lowongan', 'index')->name('.index');
                Route::prefix('/lowongan')->group(function () {
                    Route::get('/create', 'create')->name('.create');
                    Route::post('/create', 'store')->name('.store');
                    Route::get('/edit/{jobVacancy:id}', 'edit')->name('.edit');
                    Route::put('/edit/{jobVacancy:id}', 'update')->name('.update');
                    Route::delete('/destroy/{jobVacancy:id}', 'destroy')->name('.destroy');
                });
            });
            // Manage Skills
            Route::controller(AdminSkillController::class)->name('.skill')->group(function () {
                Route::get('/skills', 'index')->name('.index');
                Route::prefix('/skill')->group(function () {
//                    Route::get('/create', 'create')->name('.create');
                    Route::post('/create', 'store')->name('.store');
//                    Route::get('/edit/{jobVacancy:id}', 'edit')->name('.edit');
                    Route::put('/edit/{skill:id}', 'update')->name('.update');
                    Route::delete('/destroy/{skill:id}', 'destroy')->name('.destroy');
                });
            });
            // Manage Coin Logs
            Route::controller(AdminCoinLogController::class)->name('.coinlog')->group(function () {
                Route::get('/coins/logs', 'index')->name('.index');
                Route::prefix('/coin/log')->group(function () {
                    Route::get('/show/{coinLog:id}', 'show')->name('.show');
                    Route::delete('/destroy/{coinLog:id}', 'destroy')->name('.destroy');
                    Route::post('/restore/{coinLog:id}', 'restore')->name('.restore');
                    Route::delete('/destroy/{coinLog:id}/force', 'forceDestroy')->name('.forceDestroy');
                });
            });
        });

        // Finance Pages
        Route::prefix('finance')->name('finance')->middleware('permission:access-financecp')->group(function () {
            Route::controller(DashboardFinanceController::class)->group(function () {
                Route::get('/', 'index');
            });

            Route::get('/invoice', function () {
                return view('finance.invoice');
            })->name('.invoice');

            Route::controller(EditHargaController::class)->name('.edit-harga')->group(function () {
                Route::get('/edit-harga', 'index')->name('.index');
                Route::post('/edit-harga', 'store')->name('.store');
                Route::get('/edit-harga/{id}', 'update')->name('.update');
                // Route::get('/edit-harga/{id}', 'show')->name('.show');
                Route::put('/edit-harga/{id}', 'update')->name('.update');
            });
            Route::get('cetak/laporan', [FinanceActivityController::class, 'cetak_pdf'])->name('.cetakfinanceactivity');
            Route::get('finance-activity', [FinanceActivityController::class, 'index'])->name('.financeactivity');
            Route::post('finance/simpanharga', [EditHargaController::class, 'simpanharga'])->name('.simpanharga');
        });

        Route::controller(DashboardFinanceController::class)->name('riwayat')->group(function () {
            Route::get('/riwayat', 'index')->name('.index');
            Route::get('/riwayat/create', 'create')->name('.create');
            Route::post('/riwayat/create', 'store')->name('.store');
            // Route::get('/riwayat/edit/{role:id}', 'edit')->name('.edit');
            Route::get('/riwayat/show/{role:id}', 'show')->name('.show');
            Route::put('/riwayat/edit/{role:id}', 'update')->name('.update');
            Route::post('/riwayat/permission/{role:id}/sync', 'syncPermissions')->name('.permission.sync');
            Route::delete('/riwayat/delete/{role:id}/delete', 'destroy')->name('.delete');
        });

        Route::prefix('mitra-cp')->name('mitra')->middleware('permission:access-mitracp')->group(function () {
            Route::any('/', function () {
                return redirect()->route('mitra.dashboard');
            })->name('.cp');
            Route::controller(MitraPageController::class)->group(function () {
                Route::get('/dashboard', 'dashboard')->name('.dashboard');
            });
            // Manage Job Vacancy
            Route::controller(MitraLowonganController::class)->prefix('/lowongan')->name('.lowongan')->group(function () {
                Route::get('/', 'index')->name('.index');
                Route::get('/create', 'create')->name('.create');
                Route::post('/create', 'store')->name('.store');
//                Route::get('/show/{lowongan:id}', 'show')->name('.show');
                Route::get('/{jobVacancy:id}/edit', 'edit')->name('.edit');
                Route::put('/{jobVacancy:id}/edit', 'update')->name('.update');
                Route::delete('/{jobVacancy:id}/delete', 'destroy')->name('.destroy');
                // Manage Job Candidates
                Route::controller(MitraJobCandidateController::class)->name('.candidate')->group(function () {
                    Route::prefix('/kandidat')->group(function () {
                        Route::get('/', 'index')->name('.index');
                        Route::get('/{candidate:id}', 'show')->name('.show');
                        Route::post('/{candidate:id}/unlock', 'unlockCandidate')->name('.unlock');
                        Route::put('/{candidate:id}/submit', 'submitCandidate')->name('.submit');
                    });
                });
                // Manage Applicants
                Route::controller(MitraJobPelamarController::class)->name('.pelamar')->group(function () {
                    Route::prefix('/pelamar')->group(function () {
                        Route::get('/', 'index')->name('.index');
                        Route::get('/{jobCandidate:id}', 'show')->name('.show');
                        Route::put('/{jobCandidate:id}/accept', 'acceptCandidate')->name('.accept');
                        Route::put('/{jobCandidate:id}/reject', 'rejectCandidate')->name('.reject');
                    });
                });
            });
        });

        // Candidate Routes
        Route::name('kandidat')->group(function () {
            Route::prefix('kandidat-cp')->middleware('permission:access-kandidatcp')->group(function () {
                Route::any('/', function () {
                    return redirect()->route('kandidat.dashboard');
                })->name('.cp');
                Route::controller(CandidatePageController::class)->group(function () {
                    Route::get('/dashboard', 'dashboard')->name('.dashboard');
                });
                Route::controller(CandidateJobVacancyController::class)->prefix('/lowongan')->name('.lowongan')->group(function () {
                    Route::get('/', 'index')->name('.index');
                    Route::put('/job-candidate/{jobCandidate:id}/request/mitra/accept', 'acceptJobFromMitra')->name('.acceptJobFromMitra');
                    Route::put('/job-candidate/{jobCandidate:id}/request/mitra/reject', 'rejectJobFromMitra')->name('.rejectJobFromMitra');
                });
            });
            Route::post('/{job:id}/lamar/kerja', [CandidateJobVacancyController::class, 'registerJobForMe'])->name('.lowongan.registerJobForMe');
        });

        // User Routes
        Route::name('member')->group(function () {
            Route::prefix('/member-cp')->middleware('permission:access-usercp')->group(function () {
                Route::any('/', function () {
                    return redirect()->route('member.dashboard');
                })->name('.cp');
                Route::controller(UserCPController::class)->group(function () {
                    Route::get('/dashboard', 'dashboard')->name('.dashboard');
                    Route::get('/settings', 'settings')->name('.settings');
                    route::prefix('/settings')->name('.settings')->group(function () {
                        Route::put('/update-photo', 'updatePhoto')->name('.updatePhoto');
                    });
                });
            });
            Route::prefix('/member')->group(function () {
                Route::prefix('/daftar')->name('.daftar')->group(function () {
                    Route::controller(UserCandidateController::class)->prefix('/kandidat')->name('.kandidat')->group(function () {
                        Route::get('/', 'index')->name('.index');
                        Route::get('/information', 'informationIndex')->name('.information.index');
                        Route::put('/information', 'informationStore')->name('.information.store');
                        Route::get('/skill', 'skillIndex')->name('.skill.index');
                        Route::put('/skill', 'skillStore')->name('.skill.store');
                        Route::get('/education', 'educationIndex')->name('.education.index');
                        Route::put('/education', 'educationStore')->name('.education.store');
                        Route::get('/certificate', 'certificateIndex')->name('.certificate.index');
                        Route::put('/certificate', 'certificateStore')->name('.certificate.store');
                        Route::get('/experience', 'experienceIndex')->name('.experience.index');
                        Route::put('/experience', 'experienceStore')->name('.experience.store');
                        Route::get('/agreement', 'agreementIndex')->name('.agreement.index');
                        Route::put('/agreement', 'agreementStore')->name('.agreement.store');
                    });

                    Route::controller(UserPartnerController::class)->prefix('/mitra')->name('.mitra')->group(function () {
                        Route::get('/', 'index')->name('.index');
                        Route::get('/information', 'informationIndex')->name('.information.index');
                        Route::put('/information', 'informationStore')->name('.information.store');
                        Route::get('/agreement', 'agreementIndex')->name('.agreement.index');
                        Route::put('/agreement', 'agreementStore')->name('.agreement.store');
                    });
                });
            });
        });

    });

});

Route::name('public')->group(function () {
    Route::get('/', [PublicHomeController::class, 'index'])->name('.home');
    Route::get('/contact', [PublicContactController::class, 'index'])->name('.contact');

    Route::controller(PublicArticleController::class)->name('.article')->group(function () {
        Route::get('/tips-kerja', 'index')->name('.index');
        Route::prefix('/artikel')->group(function () {
            Route::get('/{article:id}', 'show')->name('.show');
        });
    });

    Route::controller(PublicLowonganController::class)->name('.lowongan')->group(function () {
        Route::get('/lowongan', 'index')->name('.index');
        Route::prefix('/lowongan')->group(function () {
            Route::get('/cari/skill/{skill:slug}', 'indexSkill')->name('.indexSkill');
            Route::get('/cari/lokasi/{location}', 'indexLocation')->name('.indexLocation');
            Route::get('/{job:id}-{slug}', 'showWithSlug')->name('.showWithSlug');
            Route::get('/{job:id}', 'show')->name('.show');
        });
    });

    Route::controller(PublicMitraProfileController::class)->name('.mitra')->group(function () {
        Route::prefix('/mitra')->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/{mitra:id}-{slug}', 'showWithSlug')->name('.showWithSlug');
            Route::get('/{mitra:id}', 'show')->name('.show');
        });
    });
});

Route::get('/about', function () {
    return abort(404);
});
