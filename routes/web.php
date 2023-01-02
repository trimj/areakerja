<?php

use Illuminate\Support\Facades\Route;

// Added
// Admin
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\RolePermissionController as AdminRoleController;

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
                Route::get('/article/new', 'create')->name('.create');
                Route::post('/article/new', 'store')->name('.store');
                // Route::get('/article/show/{article:id}', 'show')->name('.show');
                Route::get('/article/edit/{article:id}', 'edit')->name('.edit');
                Route::put('/article/edit/{article:id}', 'update')->name('.update');
                Route::delete('/articles/delete/{article:id}', 'destroy')->name('.destroy');
            });
            // Manage User
            Route::controller(AdminUserController::class)->name('.user')->group(function () {
                Route::get('/users', 'index')->name('.index');
                Route::get('/user/edit/{user:id}', 'edit')->name('.edit');
                Route::put('/user/edit/{user:id}/photo', 'updatePhoto')->name('.update.photo');
                Route::put('/user/edit/{user:id}/information', 'updateInformation')->name('.update.information');
                Route::get('/user/edit/{id}/role', function ($id) {
                    return abort(404);
                });
                Route::put('/user/edit/{user:id}/role', 'updateRole')->name('.update.role');
            });
            // Manage Roles
            Route::controller(AdminRoleController::class)->name('.role')->group(function () {
                Route::get('/roles', 'index')->name('.index');
                Route::get('/role/create', 'create')->name('.create');
                Route::post('/role/create', 'store')->name('.store');
                Route::get('/role/edit/{role:id}', 'edit')->name('.edit');
                Route::put('/role/edit/{role:id}', 'update')->name('.update');
                Route::post('/role/edit/{role:id}/sync', 'syncPermissions')->name('.permission.sync');
                Route::delete('/role/edit/{role:id}/delete', 'destroy')->name('.destroy');
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
                Route::put('/edit-harga/{id}', 'update')->name('.update');
            });
            Route::get('cetak/laporan', [FinanceActivityController::class, 'cetak_pdf'])->name('.cetakfinanceactivity');
            Route::get('finance-activity', [FinanceActivityController::class, 'index'])->name('.financeactivity');
            Route::post('finance/simpanharga', [EditHargaController::class, 'simpanharga'])->name('.simpanharga');

        });
        //    Route::prefix('finance')->name('finance')->middleware('permission:access-financecp')->group(function () {
        //        Route::controller(DashboardFinanceController::class)->name('.finance')->group(function(){
        //         Route::get('/', 'index')->name('.index');
        //        });
        //        Route::get('cetak/laporan',[FinanceActivityController::class,'cetak_pdf'])->name('.cetakfinanceactivity');
        //        Route::get('finance-activity',[FinanceActivityController::class,'index'])->name('.financeactivity');
        //    });

        Route::controller(DashboardFinanceController::class)->name('riwayat')->group(function () {
            Route::get('/riwayat', 'index')->name('.index');
            Route::get('/riwayat/create', 'create')->name('.create');
            Route::post('/riwayat/create', 'store')->name('.store');
            Route::get('/riwayat/edit/{role:id}', 'edit')->name('.edit');
            Route::put('/riwayat/edit/{role:id}', 'update')->name('.update');
            Route::post('/riwayat/edit/{role:id}/sync', 'syncPermissions')->name('.permission.sync');
            Route::delete('/riwayat/edit/{role:id}/delete', 'destroy')->name('.delete');
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

                // Manage Job Candidate by Skill
                Route::controller(MitraJobCandidateBySKillController::class)->name('.candidate')->group(function () {
                    Route::get('/{jobVacancy:id}/candidates/skill', 'candidateBySkill')->name('.bySkill');
                });

                // Manage Job Candidates
                Route::controller(MitraJobCandidateController::class)->name('.candidate')->group(function () {
                    Route::prefix('/kandidat')->group(function () {
                        Route::get('/', 'index')->name('.index');
                        Route::get('/{candidate:id}', 'show')->name('.show');
                        Route::post('/{candidate:id}/unlock', 'unlockCandidate')->name('.unlock');
                        Route::put('/{candidate:id}/submit', 'submitCandidate')->name('.submit');
                    });
                });
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
            Route::prefix('kandidat-cp')->group(function () {
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

        // Candidate Routes
        Route::prefix('kandidat')->name('kandidat')->group(function () {
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

        // User Routes
        Route::name('member')->group(function () {
            Route::prefix('/member-cp')->group(function () {
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
            Route::get('/cari/skill/{skill}', 'indexSkill')->name('.indexSkill');
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
