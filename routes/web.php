<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\BlogPostController as AdminBlogPostController;
use App\Http\Controllers\Admin\BlogCategoryController as AdminBlogCategoryController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\SubscriberController as AdminSubscriberController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use Illuminate\Support\Facades\Route;

// SEO routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

// Redirect root to default locale
Route::get('/', function () {
    return redirect()->route('home', ['locale' => app()->getLocale()]);
});

// Localized public routes
Route::prefix('{locale}')
    ->where(['locale' => 'en|fr'])
    ->middleware('locale')
    ->group(function () {
        // Home
        Route::get('/', [HomeController::class, 'index'])->name('home');

        // Properties
        Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
        Route::get('/properties/{slug}', [PropertyController::class, 'show'])->name('properties.show');

        // Blog
        Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
        Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

        // Static pages
        Route::get('/about', [PageController::class, 'about'])->name('about');
        Route::get('/contact', [PageController::class, 'contact'])->name('contact');
        Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

        // Newsletter
        Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
    });

// Admin routes
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Properties
        Route::resource('properties', AdminPropertyController::class);
        Route::post('properties/{property}/toggle-status', [AdminPropertyController::class, 'toggleStatus'])->name('properties.toggle-status');
        Route::post('properties/{property}/toggle-featured', [AdminPropertyController::class, 'toggleFeatured'])->name('properties.toggle-featured');
        Route::delete('properties/{property}/images/{image}', [AdminPropertyController::class, 'deleteImage'])->name('properties.delete-image');

        // Blog
        Route::resource('blog', AdminBlogPostController::class);
        Route::post('blog/{post}/toggle-status', [AdminBlogPostController::class, 'toggleStatus'])->name('blog.toggle-status');

        // Blog Categories
        Route::resource('categories', AdminBlogCategoryController::class);

        // Messages
        Route::get('messages', [AdminMessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [AdminMessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{message}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');
        Route::post('messages/{message}/mark-read', [AdminMessageController::class, 'markAsRead'])->name('messages.mark-read');

        // Subscribers
        Route::get('subscribers', [AdminSubscriberController::class, 'index'])->name('subscribers.index');
        Route::delete('subscribers/{subscriber}', [AdminSubscriberController::class, 'destroy'])->name('subscribers.destroy');
        Route::get('subscribers/export', [AdminSubscriberController::class, 'export'])->name('subscribers.export');

        // Settings
        Route::get('settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });

// Auth routes (from Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
