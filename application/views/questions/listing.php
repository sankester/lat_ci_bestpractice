<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 03/04/2017
 * Time: 11:16
 */

if (count($questions)) {
    foreach ($questions as $question) {
        echo '<h2>' . anchor('questions/detail/' . $question->id, $question->subject) . '</h2>';
        echo '<p>' . $question->first_name . ' ' . $question->last_name . ' ' . $question->created . '</p>';
    }
}