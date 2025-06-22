# Laravel Fortify Feature Guide

Detailed walkthroughs of Fortify features used in this project.

---

## 📧 Email Verification
✅ **Goal**: Require users to verify their email after registration  
📄 **File(s)**: `config/fortify.php`, `routes/web.php`, `/app/Providers/FortifyServiceProvider.php`   
🔧 **Steps**:
1. Enable feature in `config/fortify.php`:
   ```php
   Features::emailVerification(),
   ```
   
3. Ensure `MustVerifyEmail` is implemented on the `User` model.
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

4. Add View hook under `boot()` method in  
   `/app/Providers/FortifyServiceProvider.php`.
   ```php
    Fortify::verifyEmailView(fn() => view('auth.verify-email'));
   ```

5. Ensure the email template exists in  
   `/resources/views/auth/verify-email.blade.php`.

6. Protect your post-registration routes in
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

## 🔐 Two-Factor Authentication (2FA)

TBA

---

## 🔑 Password Reset from Dashboard

TBA

---
