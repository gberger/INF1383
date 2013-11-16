
@echo off
setlocal
set CURDIR=%CD%
set PGPASSWORD=cadvol

cd /D C:/BitNami/wapp*/postgresql/bin/


psql.exe -h localhost -U postgres -d postgres -f %CURDIR%\rebuild.sql
pause
endlocal