# Laravel Fortify Feature Guide

Detailed walkthroughs of Fortify features used in this project.

---

## 📧 Email Verification
✅ **Goal**: Require users to verify their email after registration  

📄 **File(s)**: `config/fortify.php`, `routes/web.php`, `/app/Providers/FortifyServiceProvider.php`   

🔧 **Steps**:
### 1. Enable feature in `config/fortify.php`:
   ```php
   Features::emailVerification(),
   ```
   
### 2. Ensure `MustVerifyEmail` is implemented on the `User` model.
    ```php
    <?php

    namespace App\Models;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

    class User extends Authenticatable implements MustVerifyEmail
    {    
        use Notifiable;
        // …
    }
    ```

### 3. Add View hook under `boot()` method in  
   `/app/Providers/FortifyServiceProvider.php`.
   ```php
    Fortify::verifyEmailView(fn() => view('auth.verify-email'));
   ```

### 4. Ensure the email template exists in  
   `/resources/views/auth/verify-email.blade.php`.

### 5. Protect your post-registration routes in
   `routes/web.php`
   ```php
    #example of protected route (dashboard etc)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })
    ->middleware(['auth','verified'])
    ->name('dashboard');
   ```
   
🔍 **Test:**
- Register with a fresh account → you’ll be auto-logged in but immediately sent to the “verify email” page
- Check your inbox and click the verification link
- Try accessing `/dashboard` before verification (should be blocked)
- After clicking it, you’ll be marked verified and can access /dashboard.

[Laravel Docs](https://laravel.com/docs)

---

## 🔑 Update Password (Dedicated Page) from dashboard
✅ **Goal**: Move the password update form to a separate page, keeping the Breeze layout and styling consistent.

📄 **Files Involved**:
- `resources/views/profile/password.blade.php`
- `resources/views/navigation-dropdown.blade.php`
- `resources/views/profile/edit.blade.php`
- `routes/web.php`   

🔧 **Steps**:

#### 1. Create a new Blade view

Add `resources/views/profile/password.blade.php` (link with laravel default profile):

```blade
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Password') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```

#### 2. Add a route

Inside the auth middleware group in routes/web.php:

```php
Route::middleware('auth')->group(function () {
    // ...

    Route::get('/profile/password', function () {
        return view('profile.password');
    })->name('profile.password.edit');
});
```

This makes `/profile/password` accessible to authenticated users.

#### 3. Add navigation link

In `resources/views/navigation-dropdown.blade.php`, add:
```blade
<x-dropdown-link :href="route('profile.password.edit')">
    {{ __('Update Password') }}
</x-dropdown-link>

<x-responsive-nav-link :href="route('profile.password.edit')">
    {{ __('Update Password') }}
</x-responsive-nav-link>
```

This will display an **Update Password** link in the user dropdown.

### 4. Remove password form from original edit page

In `resources/views/profile/edit.blade.php`, remove or comment out:
```blade
<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <div class="max-w-xl">
        @include('profile.partials.update-password-form')
    </div>
</div>
```

🔍 **Test:**
- Log in.
- Open the user menu and click Update Password.
- You should be redirected to /profile/password.
- Enter your current password, new password, and confirmation.
- Submit → A success banner should appear, confirming the change.

🔗 [Laravel Fortify Password Update Docs](https://laravel.com/docs/12.x/fortify#updating-passwords)

---

## 🔐 Two-Factor Authentication (2FA)

TBA

---

TBA

---
