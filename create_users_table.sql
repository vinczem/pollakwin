-- Create users table for pollakwin application
-- This table supports random winner selection, win status tracking, and user registration

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    won ENUM('True', 'False') DEFAULT 'False',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create index for faster random selection of non-winners
CREATE INDEX idx_users_won ON users (won);

-- Create index for email lookups (used in adduser.php for duplicate checking)
CREATE INDEX idx_users_email ON users (email);

-- Optional: Insert some sample data for testing
INSERT INTO users (name, email, won) VALUES 
('Test User 1', 'test1@example.com', 'False'),
('Test User 2', 'test2@example.com', 'False'),
('Test User 3', 'test3@example.com', 'True');
