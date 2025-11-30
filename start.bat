@echo off
echo Starting SafePaws Development Servers...
cd public
start cmd /k "php -S localhost:7000"
timeout /t 3
cd ..
start cmd /k "npm run dev"