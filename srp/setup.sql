CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    role ENUM('viewer', 'uploader'),
    subscribed TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uploader_id INT,
    title VARCHAR(255),
    description TEXT,
    duration VARCHAR(20),
    tags VARCHAR(255),
    video_file VARCHAR(255),
    thumbnail VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    video_id INT,
    user_id INT,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    video_id INT,
    user_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
