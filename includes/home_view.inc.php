<?php

declare(strict_types=1);
require_once 'dbh.inc.php';

function display_db_posts() {
    global $pdo;

    try {
        $stmt = $pdo->query("SELECT p.post_id, p.post_content, GROUP_CONCAT(c.comment_text ORDER BY c.datetime_creation ASC SEPARATOR '|') AS comments
                             FROM posts p
                             LEFT JOIN comments c ON p.post_id = c.posts_id
                             WHERE p.pending_approval = 0
                             GROUP BY p.post_id
                             ORDER BY p.datetime_creation DESC");

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="post-container">';
                echo '<div class="post-content">';
                echo '<button class="tags"><i class="fa-solid fa-tag"></i> check tags</button>';
                echo '<button class="upvote"><i class="fa-solid fa-circle-up"></i></button>';
                echo '<div class="post">';
                echo "<p>" . $row['post_content'] . "</p>";
                echo '</div>';
                echo '</div>';
                
                echo '<div class="comment-section">';
                echo '<div class="comment-list">';
                if (!empty($row['comments'])) {
                    $comments = explode('|', $row['comments']);
                    foreach ($comments as $comment) {
                        echo '<div class="comment">';
                        echo "<p>" . $comment . "</p>";
                        echo '</div>';
                    }
                } else {
                    echo '<p class="no-comments">No comments yet</p>';
                }
                echo '</div>';
                echo '<form class="comment-input">';
                echo '<textarea class="comment-entry" placeholder="comment something..."></textarea>';
                echo '<button class="submit-comment"><i class="fa-solid fa-paper-plane"></i></button>';
                echo '</form>';
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