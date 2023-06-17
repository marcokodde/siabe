<?php

use App\Http\Controllers\BenchmarkController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\BenefitPlanController;
use App\Http\Controllers\CategoryKpiController;
use App\Http\Controllers\CatPeriodController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\KpiPeriodUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeriodCategoryKpiController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PeriodKpiController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PeriodUserController;
use App\Http\Controllers\SubprojectController;
use App\Http\Controllers\ThermometerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('auth', [LoginController::class, 'auth'])->name('auth');

/**
 * Registro
 */
Route::get('signup', [SignupController::class, 'index'])->name('signup');
Route::post('register', [SignupController::class, 'register'])->name('register');

Route::group(['middleware' => ['auth']], function () {
    /**
     * Logout Routes
     */
    // Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');

    /**
     * Verification Routes
     */
    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('benefits', [BenefitController::class, 'index'])->name('benefits');
    Route::get('benefits/list', [BenefitController::class, 'list'])->name('benefits.list');
    Route::get('benefits/get', [BenefitController::class, 'get'])->name('benefits.get');
    Route::post('benefits/add', [BenefitController::class, 'add'])->name('benefits.add');
    Route::post('benefits/save', [BenefitController::class, 'save'])->name('benefits.save');
    Route::post('benefits/delete', [BenefitController::class, 'delete'])->name('benefits.delete');

    Route::get('subprojects', [SubprojectController::class, 'index'])->name('subprojects');
    Route::get('subprojects/list', [SubprojectController::class, 'list'])->name('subprojects.list');
    Route::get('subprojects/get', [SubprojectController::class, 'get'])->name('subprojects.get');
    Route::post('subprojects/add', [SubprojectController::class, 'add'])->name('subprojects.add');
    Route::post('subprojects/save', [SubprojectController::class, 'save'])->name('subprojects.save');
    Route::post('subprojects/delete', [SubprojectController::class, 'delete'])->name('subprojects.delete');

    Route::get('children', [ChildController::class, 'index'])->name('children');
    Route::get('children/list', [ChildController::class, 'list'])->name('children.list');
    Route::get('children/get', [ChildController::class, 'get'])->name('children.get');
    Route::post('children/add', [ChildController::class, 'add'])->name('children.add');
    Route::post('children/save', [ChildController::class, 'save'])->name('children.save');
    Route::post('children/delete', [ChildController::class, 'delete'])->name('children.delete');
    Route::get('children/get-by-id', [ChildController::class, 'get_by_id']);
    Route::get('children/benefit-plans/{id}', [ChildController::class, 'info']);
    Route::get('benefit-plans/add/{id}', [BenefitPlanController::class, 'add'])->name('benefit.plan.add');


    // Route::get('periods', [PeriodController::class, 'index'])->name('periods');
    Route::get('periods', [PeriodController::class, 'index'])->name('periods');
    Route::get('periods/paginated', [PeriodController::class, 'paginated'])->name('periods.paginated');
    Route::get('periods/list', [PeriodController::class, 'list'])->name('periods.list');
    Route::get('periods/get', [PeriodController::class, 'get'])->name('periods.get');
    Route::post('periods/add', [PeriodController::class, 'add'])->name('periods.add');
    Route::post('periods/save', [PeriodController::class, 'save'])->name('periods.save');
    Route::post('periods/delete', [PeriodController::class, 'delete'])->name('periods.delete');

    Route::get('period/user/', [PeriodUserController::class, 'index'])->name('periods.user');
    Route::post('period/user/add', [PeriodUserController::class, 'add'])->name('periods.kpi.add');
    Route::get('period/user/get', [PeriodUserController::class, 'get'])->name('periods.kpi.get');
    Route::get('period/user/{period_id}', [PeriodUserController::class, 'show'])->name('periods.user.show');
    // Route::get('period/user/{period_id}', [PeriodUserController::class, 'add'])->name('periods.user.add');

    Route::get('period/category/kpi/add', [PeriodCategoryKpiController::class, 'add']);
    Route::get('period/kpi/add', [PeriodKpiController::class, 'add']);

    Route::get('benchmark', [BenchmarkController::class, 'dashboard'])->name('benchmark.dashboard');
    Route::get('benchmark/statistics', [BenchmarkController::class, 'statistics'])->name('benchmark.statistics');

    Route::get('cat-periods', [CatPeriodController::class, 'index'])->name('cat.periods');
    Route::get('cat-periods/list', [CatPeriodController::class, 'list'])->name('cat.periods.list');
    Route::get('cat-periods/get', [CatPeriodController::class, 'get'])->name('cat.periods.get');
    Route::post('cat-periods/add', [CatPeriodController::class, 'add'])->name('cat.periods.add');
    Route::post('cat-periods/save', [CatPeriodController::class, 'save'])->name('cat.periods.save');
    Route::post('cat-periods/delete', [CatPeriodController::class, 'delete'])->name('cat.periods.delete');

    Route::get('thermometer', [ThermometerController::class, 'index'])->name('thermometer');
    Route::get('thermometer/period', [ThermometerController::class, 'period'])->name('thermometer.period');
    // Route::get('thermometer/show', [ThermometerController::class, 'show'])->name('thermometer.show');
    Route::get('thermometer/show/{period_id}', [ThermometerController::class, 'show'])->name('thermometer.show');

    Route::get('period/user/insert/kpis', [PeriodUserController::class, 'insert_kpis']);


    Route::get("user/add-manual", [UserController::class, "add_manual"]);

    Route::get('kpis', [KpiController::class, 'index'])->name('kpis');
    Route::get('kpis/list', [KpiController::class, 'list'])->name('kpis.list');
    Route::get('kpis/get', [KpiController::class, 'get'])->name('kpis.get');
    Route::post('kpis/add', [KpiController::class, 'add'])->name('kpis.add');
    Route::post('kpis/save', [KpiController::class, 'save'])->name('kpis.save');
    Route::post('kpis/delete', [KpiController::class, 'delete'])->name('kpis.delete');

    //
    Route::get('category-kpis/all', [CategoryKpiController::class, 'all'])->name('category.kpis.all');
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('users/list', [UserController::class, 'list'])->name('users.list');
    Route::get('users/get', [UserController::class, 'get'])->name('users.get');
    Route::post('users/add', [UserController::class, 'add'])->name('users.add');
    Route::post('users/save', [UserController::class, 'save'])->name('users.save');
    Route::post('users/edit-update', [UserController::class, 'edit_update'])->name('users.editUpdate');
    Route::post('users/pass-update', [UserController::class, 'pass_update'])->name('users.passUpdate');
    Route::post('users/delete', [UserController::class, 'delete'])->name('users.delete');
});

