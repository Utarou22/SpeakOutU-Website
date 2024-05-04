<?php

declare(strict_types=1);
require_once 'dbh.inc.php';

function display_db_posts() {
    global $pdo;
    try {
        $posts = fetch_pending_posts($pdo);

        if (!empty($posts)) {
            foreach ($posts as $post) {
                print_post_template($post);
            }
        } else {
            echo "No posts found!";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function fetch_pending_posts(PDO $pdo): array {
    $posts = [];

    $stmt = $pdo->query("SELECT post_id, post_content FROM posts WHERE pending_approval = 1 ORDER BY datetime_creation ASC");

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = $row;
        }
    }
    return $posts;
}

function print_post_template(array $post) {
    echo '<div class="post-container">';
    echo '<div class="post-content">';
    echo '<div class="post">';
    echo "<p>" . $post['post_content'] . "</p>";
    echo '</div>';
    echo '<form class="buttons-container" method="post">';
    echo '<input type="hidden" name="post_id" value="' . $post['post_id'] . '">';
    echo '<button class="ad-button" type="submit" name="action" value="approve"><i class="fa-solid fa-check"></i></button>';
    echo '<button class="ad-button" type="submit" name="action" value="reject"><i class="fa-solid fa-x"></i></button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['action']) && in_array($_POST['action'], ['approve', 'reject'])) {
        if (isset($_POST['post_id']) && is_numeric($_POST['post_id'])) {
            $post_id = (int)$_POST['post_id'];
            $action = $_POST['action'];

            handle_post_action($post_id, $action);
        }
    }
}

function handle_post_action(int $post_id, string $action) {
    global $pdo;
    try {
        if ($action === 'approve') {
            $stmt = $pdo->prepare("UPDATE posts SET pending_approval = 0 WHERE post_id = ?");
            $stmt->execute([$post_id]);
        } elseif ($action === 'reject') {
            $stmt = $pdo->prepare("DELETE FROM posts WHERE post_id = ?");
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}