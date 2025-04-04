<?php
require __DIR__ . "/../db.php";

try{
    $db->exec("CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR (128) NOT NULL,
    email VARCHAR (128) NOT NULL UNIQUE,
    role ENUM('user','admin') DEFAULT 'user',
    password VARCHAR (128) NOT NULL
    )");
  
    $db->exec("CREATE TABLE IF NOT EXISTS tasks(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR (128) NOT NULL,
    description VARCHAR (128) NOT NULL,
    active BOOL DEFAULT false,
    status ENUM ('published', 'drafted') DEFAULT 'drafted',
    difficulty INT NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP # add maximum time spent
    )");

    $db->exec("CREATE TABLE IF NOT EXISTS users_tasks(
    user_id INT,
    task_id INT,
    status ENUM('available','inProgress','completed') DEFAULT 'available', # available kerakmas
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (task_id) REFERENCES tasks(id) ON DELETE CASCADE,
    started_at TIMESTAMP,
    finished_at TIMESTAMP
    )");

    $db->exec("CREATE TABLE IF NOT EXISTS requirements(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(128),
    resource VARCHAR(128),
    task_id INT,
    FOREIGN KEY (task_id) REFERENCES tasks(id) ON DELETE CASCADE
    )");

    $db->exec("CREATE TABLE IF NOT EXISTS required_knowledge(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(128),
    resource VARCHAR(128),
    task_id INT,
    FOREIGN KEY (task_id) REFERENCES tasks(id) ON DELETE CASCADE
    )");

} catch(PDORxception $e){
    die("Xatolik: " . $e->getMessage());
}
