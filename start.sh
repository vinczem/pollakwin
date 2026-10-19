#!/bin/bash
set -e

echo "🚀 Starting Pollakwin Application..."

# Pull the image published by GitHub Actions and start the containers
echo "📦 Downloading Docker images..."
docker compose pull

echo "🔄 Starting services..."
docker compose up -d --no-build --wait

echo "✅ Application is ready!"
echo "🌐 Web application: http://localhost:8080"
echo "🗄️  PostgreSQL: db:5432 (internal Docker network)"
echo ""
echo "To stop the application, run: docker compose down"
echo "To view logs, run: docker compose logs -f"
