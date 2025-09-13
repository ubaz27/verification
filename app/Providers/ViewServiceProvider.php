<?php

namespace App\Providers;

use App\Models\ContactMessage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Share unread messages count with admin sidebar
        View::composer('admin.layout.sidebar', function ($view) {
            if (Auth::guard('admin')->check()) {
                $unreadMessagesCount = ContactMessage::unread()->count();
                $view->with('unreadMessagesCount', $unreadMessagesCount);
            }
        });
    }
}
