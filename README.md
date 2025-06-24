## 📘 Project Summary

This Laravel 12 Fortify Playground demonstrates modern authentication workflows using [Laravel Fortify](https://laravel.com/docs/12.x/fortify) with Breeze UI. It includes core features like registration, email verification, 2FA, password reset, and more — built for learning, reference, or quick prototyping.

---

## 🛠️ Implemented Features Overview

| Feature                          | Description                                                                 |
|----------------------------------|-----------------------------------------------------------------------------|
| ✅ Laravel 12 Setup              | Fresh Laravel 12 app initialized and configured                             |
| ✅ Fortify Installed             | Auth backend powered by Laravel Fortify                                     |
| ✅ Breeze UI (Blade)             | Simple UI scaffolding using Laravel Breeze (Blade stack)                    |
| ✅ Email Verification            | User must verify email before full access                                   |
| ✅ Custom Change Password Page   | Separated password update page (not part of profile page)                   |
| ✅ Profile Update                | Name update directly; email changes require re-verification                 |
| ✅ 2FA Enable/Disable            | Time-based One-Time Password (TOTP) + recovery codes                        |
| ✅ Forgot Password Flow          | `/forgot-password` with email-based reset link                              |
| ✅ Login + 2FA                   | 2FA enforced only if enabled by the user                                    |
| ✅ Reset Password (Dashboard)    | User can change password from within dashboard view                         |

---

## 🧭 Try It Out

You can test the key routes after running the server:

```bash
php artisan serve
```

Then open:

- [`/register`](#) → Create account + email verification  
- [`/login`](#) → Standard login with optional 2FA  
- [`/forgot-password`](#) → Email reset flow  
- [`/user/profile`](#) → Update name/email  
- [`/user/password`](#) → Update password (custom page)  
- [`/two-factor`](#) → Enable/disable TOTP + recovery codes  

---

## 📚 Extra Guides

See [`docs/fortify-features.md`](docs/fortify-features.md) for:

- How to enable/disable each Fortify feature
- Code examples for view customization
- Optional enhancements (e.g., throttle logins, custom redirect)
- Tutorial on ['youtube'](https://www.youtube.com/watch?v=g0zbTrWWje4)
