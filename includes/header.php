<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document PHP</title> -->
    <title><?php
            if (isset($page_title)) {
                echo "$page_title";
            } else {
                echo "PHP Blog Website";
            }
            ?></title>

    <meta name="description" content="<?php
                                        if (isset($meta_description)) {
                                            echo "$meta_description";
                                        } else {
                                            echo "PHP Blog Website";
                                        }
                                        ?>">
    <meta name="keywords" content="<?php
                                    if (isset($meta_keywords)) {
                                        echo "$meta_keywords";
                                    } else {
                                        echo "PHP Blog Website";
                                    }
                                    ?>">

    <meta name="author" content="Blex Of IT">


    <link rel="stylesheet" href="assets/css/bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>