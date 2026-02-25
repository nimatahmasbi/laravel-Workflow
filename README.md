# سیستم گردش کار (Workflow Management System)

یک سیستم مدیریت گردش کار و فرآیندهای سازمانی با Laravel 12

## ویژگی‌ها

- مدیریت دپارتمان‌ها
- تعریف گردش کارها با مراحل متعدد
- مدیریت تسک‌ها و تخصیص آنها
- رابط کاربری فارسی و RTL
- طراحی مدرن و ریسپانسیو
- سیستم احراز هویت و سطوح دسترسی
- گزارش‌گیری و داشبورد
- کنترل دسترسی بر اساس نقش کاربران

## نیازمندی‌ها

- PHP 8.2+
- Laravel 12
- SQLite/MySQL
- Composer

## نصب و راه‌اندازی

1. کلون کردن پروژه:
```bash
git clone <repository-url>
cd workflow-system
```

2. نصب وابستگی‌ها:
```bash
composer install
```

3. کپی فایل محیط:
```bash
cp .env.example .env
```

4. تنظیم دیتابیس در فایل `.env`

5. تولید کلید برنامه:
```bash
php artisan key:generate
```

6. اجرای مایگریشن‌ها:
```bash
php artisan migrate
```

7. پر کردن دیتابیس با داده‌های نمونه:
```bash
php artisan db:seed
```

8. اجرای سرور:
```bash
php artisan serve
```

## اطلاعات ورود

### کاربران پیش‌فرض

| نقش | ایمیل | رمز عبور | دسترسی |
|-----|--------|-----------|---------|
| **Admin** | admin@workflow.com | password | دسترسی کامل به همه بخش‌ها |
| **Manager** | ahmad@workflow.com | password | مدیریت دپارتمان‌ها + دسترسی supervisor |
| **Supervisor** | fateme@workflow.com | password | مدیریت گردش کارها و تسک‌ها |
| **User** | ali@workflow.com | password | فقط مشاهده (بدون دسترسی مدیریت) |

### سطوح دسترسی

#### 🔐 Admin (مدیر سیستم)
- دسترسی کامل به همه بخش‌ها
- مدیریت کاربران و نقش‌ها
- مشاهده تمام گزارش‌ها

#### 👔 Manager (مدیر دپارتمان)
- مدیریت دپارتمان‌ها
- ایجاد، ویرایش و حذف دپارتمان
- دسترسی supervisor

#### 👨‍💼 Supervisor (سرپرست)
- مدیریت گردش کارها
- مدیریت تسک‌ها
- تخصیص تسک به کاربران

#### 👤 User (کاربر عادی)
- مشاهده گردش کارها
- مشاهده تسک‌های تخصیص داده شده
- بدون دسترسی مدیریت

## ساختار پروژه

```
app/
├── Http/Controllers/     # کنترلرها
├── Models/              # مدل‌ها
└── Http/Middleware/     # میدلورها (شامل CheckRole)

database/
├── migrations/          # مایگریشن‌ها
└── seeders/            # سیدرها

resources/views/         # ویوها
├── layouts/            # قالب‌های اصلی
├── dashboard/          # صفحات داشبورد
├── departments/        # صفحات دپارتمان‌ها
├── workflows/          # صفحات گردش کارها
└── tasks/             # صفحات تسک‌ها

routes/
└── web.php             # مسیرها با middleware های دسترسی
```

## امنیت و دسترسی

### Middleware های امنیتی
- `CheckRole`: کنترل دسترسی بر اساس نقش کاربر
- `auth`: احراز هویت کاربران

### مسیرهای محافظت شده
- **Departments**: فقط Manager و Admin
- **Workflows**: فقط Supervisor، Manager و Admin  
- **Tasks**: فقط Supervisor، Manager و Admin
- **Dashboard**: همه کاربران احراز هویت شده

## تکنولوژی‌های استفاده شده

- **Backend**: Laravel 12
- **Frontend**: Bootstrap 5 RTL
- **Icons**: Font Awesome
- **Fonts**: Vazirmatn (فونت فارسی)
- **Database**: SQLite/MySQL
- **Security**: Role-based Access Control (RBAC)

## مجوز

این پروژه تحت مجوز MIT منتشر شده است.
