<?php
  // session_start();

  // if (!isset($_SESSION['user_id'])) {
  //   header('Location: View/login.php');
  //   exit();
  // }
  
  use Core\DB;  
  $pdo=(new DB())->connect();

  $default_records_per_page = 10;
  $records_per_page = isset($_GET['records_per_page']) ? (int)$_GET['records_per_page'] : $default_records_per_page;
    
    
  $stmt = $pdo->prepare("SELECT COUNT(*) FROM tasks WHERE tasks.status='published';");
  $stmt->execute();
  $total_records = $stmt->fetchColumn(); 
    
  if(isset($_GET['records_per_page']) && $_GET['records_per_page'] === 'all') {
      $records_per_page = $total_records; 
  } 
    
  $total_pages = $records_per_page === $total_records ? 1 : ceil($total_records / $records_per_page);
  $current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
  $offset = ($current_page - 1) * $records_per_page;
    
  $stmt = $pdo->prepare("SELECT id, title, active, difficulty, deadline from tasks WHERE tasks.status='published' ORDER BY tasks.id ASC LIMIT :offset, :records_per_page");
  $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
  $stmt->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
  $stmt->execute();
  $tasks = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="https://cdn.logojoy.com/wp-content/uploads/2018/05/30164225/572-768x591.png" alt="Logo:" style="width: 80px; height: 60px;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="View/user_own_posts.php">My Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="View/new_post.php">New Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="View/login.php">Login</a>
      </li>
    </ul>
  </div>
</nav>     
<h1>All Tasks</h1>

<form method="get" action="/resource/vievs/home.php">
    <label for="records_per_page">Records per page:</label>
    <select id="records_per_page" name="records_per_page">
        <option value="5" <?php echo $records_per_page==5 ? 'selected' : '' ?>>5</option>
        <option value="10" <?php echo $records_per_page==10 ? 'selected' : '' ?>>10</option>
        <option value="20" <?php echo $records_per_page==20 ? 'selected' : '' ?>>20</option>
        <option value="50" <?php echo $records_per_page==50 ? 'selected' : '' ?>>50</option>
        <option value="all" <?php echo $records_per_page == $total_records && $_GET['records_per_page'] === 'all' ? 'selected' : ''; ?>>All</option>

    </select>
    <button type="submit">Set</button>
</form>

<ul>
  <?php
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Active</th>
        <th>Difficulty</th>
        <th>Deadline</th>
    </tr>";
    echo "<tr>
    <td>dsfsdf</td>
        <td><a href='home/task?id=1'>view</a></td>
        <td>sdfsdf</td>
        <td>sdfsdf</td>
        <td>sdads</td>
    </tr>";
    foreach ($tasks as $task) {
      echo "<tr>
        <td>{$task['id']}</td>
        <td>{$task['title']}</td>
        <td>{$task['active']}</td>
        <td>{$task['difficulty']}</td>
        <td>{$task['deadline']}</td>
        <td><a href='home/task?id={$task['id']}'>View</a></td>
      </tr>";
    }
    echo "</table>";
  ?>
</ul>

<div>
    <a href="home.php?page=<?php echo $current_page-1==0 ? $current_page : $current_page-1; ?>&records_per_page=<?php echo $_GET['records_per_page']; ?>">Previous</a>
    <?php
    for ($page = 1; $page <= $total_pages; $page++) {
        echo '<a href="/resource/vievs/home.php?page=' . $page . '&records_per_page=' . $records_per_page . '">' . $page . '</a> ';
    }
    ?>
    <a href="/resource/vievs/home.php?page=<?php echo $current_page + 1>$total_pages ? $current_page : $current_page + 1; ?>&records_per_page=<?php echo $_GET['records_per_page']; ?>">Next</a>
</div>

</body>
</html>