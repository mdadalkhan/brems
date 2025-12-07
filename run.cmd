@echo off
REM =====================================
@echo mdadalkhan@gmail.com
REM =====================================

cd svelte
@echo Compiling resources...
cmd /c npm run build

cd ..

start http://localhost:8000
cmd /c php artisan serve

pause
