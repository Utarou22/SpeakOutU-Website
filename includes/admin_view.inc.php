<?php

declare(strict_types=1);
require_once 'dbh.inc.php';

function display_db_posts() {
    
    global $pdo;

    try {
        $stmt = $pdo->query("SELECT post_id, post_content FROM posts WHERE pending_approval = 1 ORDER BY datetime_creation ASC");

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="post-container">';
                echo '<div class="post-content">';
                echo '<div class="post">';
                echo "<p>" . $row['post_content'] . "</p>";
                echo '</div>';
                echo '<button class="ad-button" data-post-id="' . $row['post_id'] . '"><i class="fa-solid fa-check"></i></button>';
                echo '<button class="ad-button" data-post-id="' . $row['post_id'] . '"><i class="fa-solid fa-x"></i></button>';
                echo '</div>';
                echo '</div>';
            }
         } else {
            echo "No posts found!";
         }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}