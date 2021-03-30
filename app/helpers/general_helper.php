<?php

// Simple page redirect
function redirect($page) {
    header('location:' . URLROOT . '/' . $page);
}

// Helper for saving html source code in db with ckeditor
function convertData($body_content) {
    $body_content = trim($body_content);
    $body_content = stripslashes($body_content);
    $body_content = htmlspecialchars($body_content);

    return $body_content;
}

//    Extracting 20, 21 words to print in index (2 sentences)
function word_count($string) {
    $str_length = str_word_count($string, 0);
    $array_words = str_word_count($string, 1);
    $words      = '';

    if($str_length < 20) {
        return $string;
    } else {

        for ($i = 0; $i <= 20; $i++) {
            $words = $words . " " . $array_words[$i];
        }
    }
    return $words . "...";
}

// Category color helper
function colors_category($category_name) {
    switch ($category_name) {
        case 'Nouveaute':
        case 'alaune':
            echo "category-alaune";
            break;

        case 'Festivites':
        case 'Festvites':
        case 'festivites':
            echo "category-festivites";
            break;

        case 'Communique':
        case 'communique':
            echo "category-communiques";
            break;

        case 'Innovation':
        case 'innovation':
            echo "category-innovation";
            break;

        case 'Projet':
        case 'projet':
            echo "category-projets";
            break;

        case 'Soutenances':
        case 'soutenances':
            echo "category-soutenances";
            break;

        case 'Archives':
        case 'archives':
            echo "category-archives";
            break;

        case 'Aides' :
        case 'aides':
            echo "category-aides";
            break;
    }
}

function formatDate($date) {
    echo DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
}

function formatDateMin($date) {
    echo DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i');
}

