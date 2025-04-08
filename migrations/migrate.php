<?php
require_once __DIR__. '/../Core/DB.php';


use Core\DB;

$migrations = [
    'create_users.php',
    'create_tasks.php',
    'create_users_tasks.php',
    'create_requirements.php',
    'create_required_knowledge.php',
    'alter_table_users_tasks.php',
    'alter_table_tasks.php'
];

foreach($migrations as $migration){
    require __DIR__ . "/{$migration}";
}
