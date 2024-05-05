<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocalizationController;
use App\Http\Middleware\Localization;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrganismController;
use App\Models\LoginHistory;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserActionController;
use App\Http\Controllers\NextController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserMailController;

Route::fallback(function(){
    return view('errors.404');
});

Route::get('/',function(){
    return view('home.home');
})->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login'])->name('login.login');
Route::get('/signUp', [RegisterController::class, 'create'])->name('register');
Route::post('/singUp', [RegisterController::class, 'store'])->name('register.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/mail', [MailController::class, 'index'])->name('mail.index');
    Route::get('/mail/create', [MailController::class, 'create'])->name('mail.create');
    Route::post('/mail', [MailController::class, 'store'])->name('mail.store');
    Route::get('/mail/{id}/edit', [MailController::class, 'edit'])->name('mail.edit');
    Route::put('/mail/{id}', [MailController::class, 'update'])->name('mail.update');
    Route::delete('/mail/{id}', [MailController::class, 'destroy'])->name('mail.destroy');
    Route::get('/mail/{id}', [MailController::class, 'show'])->name('mail.show');
    Route::get('/home', [NextController::class, 'next'])->name('next');
    Route::get('/archive', [CategoryController::class, 'archive'])->name('archive.index');
    Route::get('/category/{id}', [CategoryController::class, 'showCategoryMails'])->name('category.show');
    Route::get('/profile',[ProfilController::class,'index'])->name('profile');
    Route::post('/profile/update/{user}', [ProfilController::class, 'update'])->name('profile.update');
    Route::get('/mes-courriers', [UserMailController::class, 'index'])->name('myMail.index');

});

Route::middleware(['auth', 'adminUser'])->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/addUser', [RegisteredUserController::class, 'create'])->name('add');
            Route::post('/addUser', [RegisteredUserController::class, 'store'])->name('add.store');
            Route::get('/users', [UserController::class, 'index'])->name('admin.index');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.edit');
            Route::put('/users/{user}/update', [UserController::class, 'update'])->name('admin.update');
            Route::get('/users/{user}/confirm-delete', [UserController::class, 'confirmDelete'])->name('admin.confirm-delete');
            Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('admin.destroy');
            Route::get('/users/{user}/show', [UserController::class, 'show'])->name('admin.show');
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
            Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
            Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
            Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
            Route::get('/manage', [AdminController::class, 'manage'])->name('admin.manage');
            Route::get('/organisms', [OrganismController::class, 'index'])->name('organisms.index');
            Route::get('/organisms/create', [OrganismController::class, 'create'])->name('organisms.create');
            Route::post('/organisms', [OrganismController::class, 'store'])->name('organisms.store');
            Route::get('/organisms/{organism}/edit', [OrganismController::class, 'edit'])->name('organisms.edit');
            Route::put('/organisms/{organism}', [OrganismController::class, 'update'])->name('organisms.update');
            Route::delete('/organisms/{organism}', [OrganismController::class, 'destroy'])->name('organisms.destroy');
            Route::get('/organisms/{organism}', [OrganismController::class, 'show'])->name('organisms.show');
            Route::get('/login-history', function () {
                $loginHistory = LoginHistory::all();
                return view('admin.login-history', ['loginHistory' => $loginHistory]);
            })->name('login.history');
            Route::get('/dashboard/details', [AdminController::class, 'detail'])->name('admin.detail');
            Route::get('/admin/users', [UserController::class, 'user'])->name('admin.users');
            Route::put('/admin/users/{user}/toggle', [UserController::class, 'toggleActive'])->name('admin.users.toggle');
            Route::post('/admin/users/{userId}/permissions', [AdminController::class, 'updatePermissions'])->name('admin.users.permissions');
            Route::get('/admin/users-actions', [UserActionController::class, 'index'])->name('user-actions.index');
            Route::get('/admin/deleted-mails', [MailController::class, 'showDeletedMails'])->name('mail.deleted');
            Route::delete('/mail/delete-permanently/{id}', [MailController::class, 'deletePermanently'])->name('mail.delete-permanently');
            Route::get('/mail/deleted/{id}', [MailController::class, 'showDeleted'])->name('mail.deleted.show');
        });
});
Route::get('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

Route::middleware([Localization::class])->group(function () {
    Route::get('locale', [LocalizationController::class, 'getLang'])->name('getlang');
    Route::get('locale/{lang}', [LocalizationController::class, 'setLang'])->name('setlang');
});
Route::post('/submit-comment', [CommentController::class, 'submitComment'])->name('submit-comment');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/email',function(){
    return view("emails.reset_password");
});











