#!/bin/bash

echo "📦 Installing frontend dependencies..."

# Check if Node.js is installed
if ! command -v node &> /dev/null; then
    echo "❌ Node.js is not installed!"
    echo "Please install Node.js from https://nodejs.org/"
    exit 1
fi

# Install npm dependencies
echo "Installing Bulma CSS framework..."
npm install

if [ $? -eq 0 ]; then
    echo "✅ Dependencies installed successfully!"
    echo "🎨 Bulma CSS is now available at: node_modules/bulma/css/bulma.css"
else
    echo "❌ Failed to install dependencies"
    exit 1
fi
