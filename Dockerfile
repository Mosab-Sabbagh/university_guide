# استخدام الصورة الرسمية لـ PHP مع إضافة إضافات لارافيل
FROM php:8.2-fpm

# تثبيت dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# مسح الكاش
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# تثبيت إضافات PHP المطلوبة
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# إنشاء مسار العمل
WORKDIR /var/www

# نسخ ملفات المشروع
COPY . .

# تعيين الصلاحيات للمجلدات
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# تشغيل composer install
RUN composer install --optimize-autoloader --no-dev