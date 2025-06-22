# Laravel 12 Setup

Initial setup of Laravel 12 and Fortify from scratch 

### 1. Create project
```bash
composer create-project laravel/laravel laravel12-fortify "12.*"
cd laravel12-fortify
```

### 2. Github Setup (Optional)
```bash
git init
git remote add origin https://github.com/<your-username>/laravel12-fortify.git
git add .
git commit -m "Initial Laravel 12 skeleton"
```

### 3. Create database
 ![image](https://github.com/user-attachments/assets/b3433edc-5811-479d-94dc-03a969df04a6)

### 4. Environmental configuration - especially the database and mail settings. 
--- 
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database_name
    DB_USERNAME=root
    DB_PASSWORD=

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=your_mailtrap_user
    MAIL_PASSWORD=your_mailtrap_pass
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
```

Copy `.env.example` to `.env` and adjust your environment variables (database, mail). 

Generate the application key: 
```bash 
php artisan key:generate
```

### 5. Setup Fortify and UI (Refer below)

### 6. Install Dependencies
```bash 
npm install
npm run dev
```

### 7. Run migration 
```bash
php artisan migrate
```

### 8. Tweaks with the Fortify features

---

## 🛡️ Fortify Setup
✅ **Goal**: Require users to verify their email after registration  
📄 **File(s)**: `config/fortify.php`, `routes/web.php`  
🔧 **Steps**:
1. **Installation**

   ```bash
    # 1. Get Fortify Package
    composer require laravel/fortify

    # 2. Publish & Install Fortify
    php artisan fortify:install
    php artisan migrate
   ```

2. **Enable Features Registered** 

In `config/fortify.php`, ensure the features you want are uncommenetd: 

   ```bash
    'features' => [ 
             Features::registration(), 
         Features::resetPasswords(), 
         Features::emailVerification(), 
         Features::updateProfileInformation(), 
         Features::updatePasswords(), 
         Features::twoFactorAuthentication([ 
             'confirm' => true, 
             'confirmPassword' => true, 
         ]), 
     ],
   ```

---

## 🎨 Breeze UI Setup 
✅ **Goal**: Require users to verify their email after registration  
📄 **File(s)**: `config/fortify.php`, `routes/web.php`  
🔧 **Steps**:
   ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install blade
   ```

---

## Clone the Repository
```bash
# 1. Clone the repo
git clone https://github.com/yourusername/laravel12-fortify.git
cd laravel12-fortify 

# 2. Install PHP dependencies 
composer install 

# 3. Install NPM dependencies 
npm install

# 4. Build frontend assets 
npm run dev 
```

Copy `.env.example` to `.env` and adjust your environment variables (database, mail). 

Generate the application key: 

```bash 
php artisan key:generate
```



---
