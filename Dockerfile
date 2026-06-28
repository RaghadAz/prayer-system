# استخدم صورة PHP جاهزة
FROM php:8.2-fpm

# تثبيت المتطلبات الأساسية
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev

# تثبيت إضافات PHP المطلوبة للارافيل
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring zip exif pcntl bcmath gd

# تثبيت Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# مجلد العمل
WORKDIR /var/www

# نسخ المشروع
COPY . .

# تثبيت باقات لارافيل
RUN composer install --no-dev --optimize-autoloader

# إنشاء APP_KEY
RUN php artisan key:generate

# فتح البورت
EXPOSE 10000

# تشغيل لارافيل
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000
