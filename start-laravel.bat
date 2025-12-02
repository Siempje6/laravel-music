@echo off
SETLOCAL

REM Vereiste PHP-versie
set "REQUIRED_PHP=8.1"

REM Huidige PHP-versie ophalen
for /f "tokens=*" %%i in ('php -r "echo PHP_VERSION;"') do set "CURRENT_PHP=%%i"
echo Huidige PHP-versie: %CURRENT_PHP%

REM Check PHP-versie (basis check)
for /f "tokens=1-3 delims=." %%a in ("%CURRENT_PHP%") do (
    set PHP_MAJOR=%%a
    set PHP_MINOR=%%b
    set PHP_PATCH=%%c
)

if %PHP_MAJOR% LSS 8 (
    echo ⚠️  PHP versie te laag! Update PHP naar 8.1 of hoger.
) else if %PHP_MAJOR%==8 if %PHP_MINOR% LSS 1 (
    echo ⚠️  PHP versie te laag! Update PHP naar 8.1 of hoger.
)

REM Composer dependencies installeren
echo 📦 Composer dependencies installeren...
composer install

REM Laravel server starten
echo 🚀 Laravel server starten...
php artisan serve

ENDLOCAL
pause
