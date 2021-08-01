
<?php
// Database connection

$database = new DB();
$db = $database->openConnection();

$perPage = 1;

// Calculate Total pages
$stmt = $db->query('SELECT count(*) FROM users');
$total_results = $stmt->fetchColumn();
$total_pages = ceil($total_results / $perPage);

// Current page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$starting_limit = ($page - 1) * $perPage;

// Query to fetch users
$query = "SELECT * FROM users ORDER BY id DESC LIMIT $starting_limit,$perPage";

// Fetch all users for current page
$users = $db->query($query)->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
</head>

<body>
    <?php foreach ($users as $key => $user) : ?>
        <h4><?php echo $user['id']; ?></h4>
        <p><?php echo $user['emri']; ?></p>
        <hr>
    <?php endforeach; ?>


    <?php for ($page = 1; $page <= $total_pages; $page++) : ?>
        <a href='<?php echo "?faqja=$page"; ?>' class="links">
            <?php echo $page; ?>
        </a>
    <?php endfor; ?>
</body>

</html>