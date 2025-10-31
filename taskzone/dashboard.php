<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TaskZone</title>
</head>
<body>
    <header>
        <h1>TaskZone Dashboard</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="dashboard.php" class="active">Dashboard</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <section class="dashboard-section">
            <h2>Welcome to your Dashboard</h2>
            <?php echo($_COOKIE['lastLogin']); ?>
            <p>Esta es la ultima vez que te logueaste</p>
        </section>
        <section class="tasks-section">
            <h2>New Taks</h2>
            <br>
            <form action="dashboard.php" method="POST" class="task-form">
                <label for="task_title">Task Title:</label>
                <input type="text" id="title" name="title" required>
                <br>
                <label for="task_description">Task Description:</label>
                <textarea id="description" name="description" required></textarea>
                <br>
                <label for="task_due_date">Due Date:</label>
                <input type="date" id="due_date" name="due_date" required>
<br>
                <button type="submit">Add Task</button>
            </form>
        </section>
        <section class="tasks-list-section">
            <h2>Your Tasks</h2>
            <?php
            include 'connection.php';
            $user_id = $_SESSION['user_id'];
            $stmt = $pdo->prepare('SELECT * FROM tasks WHERE user_id = :user_id');
            $stmt->execute(['user_id' => $user_id]);
            $tasks = $stmt->fetchAll();
            if ($tasks) {
                echo "<ul>";
                foreach ($tasks as $task) {
                    echo "<li><strong>" . htmlspecialchars($task['title']) . "</strong>: " . htmlspecialchars($task['description']) . " (Due: " . htmlspecialchars($task['due_date']) . ")</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No tasks found.</p>";
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 TaskZone. All rights reserved.</p>
    </footer>
</body>
</html>
<?php
require_once 'connection.php';
$user_id = $_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    $stmt = $pdo->prepare('INSERT INTO tasks (user_id, title, description, due_date) VALUES (:user_id, :title, :description, :due_date)');
    try {
        $stmt->execute([
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'due_date' => $due_date
        ]);
        echo "<p>Task added successfully!</p>";
    } catch (PDOException $e) {
        error_log('Task insertion error: ' . $e->getMessage());
        echo "<p>An error occurred while adding the task. Please try again later.</p>";
    }
}

?>