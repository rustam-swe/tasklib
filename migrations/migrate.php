<?php
use App\Models\DB;

$migrations = [
    'create_users.php',
    'create_tasks.php',
    'create_users_tasks.php',
    'create_requirements.php',
    'create_required_knowledge.php'
];

foreach($migrations as $migration){
    require __DIR__ . "/{$migration}";
}