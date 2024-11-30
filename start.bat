@ECHO OFF
CALL :sleep
start "" /wait cmd /c "runcomposer.bat"
CALL :sleep
start "" /wait cmd /c "migrasi.bat"
CALL :sleep
start "" cmd /c "php artisan serve"
PAUSE