<?php

declare(strict_types=1);
require_once 'dbh.inc.php';

function display_db_posts() {
    
    global $pdo;

    try {
        $stmt = $pdo->query("SELECT post_content FROM posts WHERE pending_approval = 0 ORDER BY datetime_creation DESC");

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="post-container">';
                echo '<div class="post-content">';
                echo '<button class="upvote"><i class="fa-solid fa-turn-up"></i></button>';
                echo '<div class="post">';
                echo "<p>" . $row['post_content'] . "</p>";
                echo '</div>';
                echo '</div>';
                echo '<div class="comment-section">';
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