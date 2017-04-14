<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 14/04/2017
 * Time: 22:32
 */

if (count($posts)) {
    foreach ($posts as $post) {
        echo '<h1>'. $post['title'].'</h1>';
        echo '<p>'. $post['text'].'</p>';
    }
}