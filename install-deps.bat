@echo off
echo 📦 Installing frontend dependencies...

REM Check if Node.js is installed
node --version >nul 2>&1
if errorlevel 1 (
    echo ❌ Node.js is not installed!
    echo Please install Node.js from https://nodejs.org/
    pause
    exit /b 1
)

REM Install npm dependencies
echo Installing Bulma CSS framework...
npm install

if errorlevel 0 (
    echo ✅ Dependencies installed successfully!
    echo 🎨 Bulma CSS is now available at: node_modules/bulma/css/bulma.css
) else (
    echo ❌ Failed to install dependencies
)

pause
