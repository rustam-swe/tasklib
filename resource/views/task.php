<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
      body{
<<<<<<< HEAD
        background-color: gray;
=======
        background-color: #000000;
>>>>>>> 2d9edca (PATCH: css is changed in task.php)
      }
      .delete{
        width: 100%;
        height: 50px;
      }
      .edit{
        width: 100%;
        height: 50px;
      }
      .task{
        margin-top: 60px;
<<<<<<< HEAD
        background-color: #fff;
=======
        background-color: #F0F8FF;
>>>>>>> 2d9edca (PATCH: css is changed in task.php)
        border-radius: 13px;
        padding: 50px;
      }
      .status{
        margin-top: 60px;
      }
      .desc{
        margin-top: 100px;
        margin-right: 160px;
      }
      .req{
        margin-top: 80px;
      }
      .req_a{
        text-decoration: none;
        color: #000000;
      }
      .req_a:hover{
        background:rgb(245, 241, 30);
        color:black;
        border-radius: 12px;
      }
    </style>
  </head>
  <body class="mt-4 mb-4">
    <div class="container task">
        <div class="row">
            <div class="col-10">
            <h1><?=$task['title']?></h1>
            <p class="desc fs-3"><?=$task['description']?></p>
                <div style="display:flex; justify-content:space-between;">
                  <div>
                  <h2 class="req">Requirements:</h2>
                <ul class="text-secondary fs-5">
<?php foreach($task['requirements'] as $requirement):?>  
<li style="font-size: 1.5em; color: black; text-primary">
<a class="req_a" href="<?=$requirement['resource']?>"><?=$requirement['title']?></a>
</li>
<?php endforeach;?>
                  </ul>
                  </div>
                  <div>
                  <h2 class="req">Required knowledge:</h2>
                <ul class="text-secondary fs-5">
                  <?php foreach($task['requiredKnowledges'] as $requirement):?>
<li style="font-size: 1.5em; color: black; text-primary">
<a class="req_a" href="<?=$requirement['resource']?>"><?=$requirement['title']?></a>
</li>
<?php endforeach;?>
                </ul>
                  </div>
                </div>
            
            </div>
            <div class="col">
              <a href="" class="btn btn-danger delete"><h4 align="center">Delete</h4></a>
              <a href="" class="btn btn-warning edit mt-3"><h4 align="center">Edit</h4></a>
              <h4 class="mt-5 fst-italic">difficulty level:</h4>
              <h3 align="center" class="mt-1 border border-3 border-dark text-danger"><?=$task['difficulty']?></h3>
              <h3 align="center" class="mt-1 border border-3 border-dark text-warning">start button</h3>
              <h4 class="mt-4 fst-italic">deadline:</h4>
              <i class="bi bi-hourglass text-danger fs-3"></i>
              <span class="ms-2 fw-bold text-secondary fs-4"><?=$task['deadline']?></span>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
