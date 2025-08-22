#!/bin/bash

echo "🚀 Starting Pollakwin Application..."

# Build and start the containers
echo "📦 Building Docker images..."
docker-compose build --no-cache

echo "🔄 Starting services..."
docker-compose up -d

echo "⏳ Waiting for database to be ready..."
sleep 10

echo "✅ Application is ready!"
echo "🌐 Web application: http://localhost:8080"
echo "🗄️  Database: localhost:3306"
echo ""
echo "To stop the application, run: docker-compose down"
echo "To view logs, run: docker-compose logs -f"
