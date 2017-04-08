<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 03/04/2017
 * Time: 11:16
 */

if (count($questions)) {
    foreach ($questions as $question) {
        echo '<h2>' . anchor('questions/detail/' . $question->id, escape($question->subject)) . '</h2>';
        echo '<p>' . escape($question->first_name) . ' ' . escape($question->last_name) . ' ' . escape($question->created) . '</p>';
    }
}