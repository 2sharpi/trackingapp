<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <title><?php if (isset($title) && !empty($title)) echo 'CI Blog - ' . $title; else echo 'CI Blog'; ?></title>
    <link rel="stylesheet" type="text/css" href="/css/milligram.min.css">

    <style>
        .site-heading {
            display: inline-block;
            padding: 0;
            margin: 0;
        }

        nav {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.2) 0 10px 10px;
            box-sizing: border-box;
            padding: .3rem 1rem;
        }
        }

        ul.nav {
            list-style-type: none;
        }

        ul.nav li {
            display: inline-block;
            margin: .3rem .6rem;
        }

        section.site {
            padding-top: 100px;
        }
    </style>
</head>
<body>

<nav>
    <h2 class="site-heading"><a href="/">CI Blog</a></h2>
    <ul class="nav float-right">
        <?php if (isset($logged_in) && $logged_in && isset($user) && $user): ?>
            <li><span class="button button-clear"><?= $user['username'] ?></span></li>
            <li><a class="button button-clear" href="/addPost">Add Post</a></li>
            <li><a class="button button-clear" href="/logout">Logout</a></li>
        <?php else: ?>
            <li><a class="button button-clear" href="/login">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>

<section class="site">
    <div class="container">
        <div class="row">
            <div class="column">
