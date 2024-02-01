<?php defined('BASEPATH') or die("No Access Allowed");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title Here</title>
    <style>
        body {
            background-image: url('./assets/img/bg4.png'); /* Replace 'path/to/your/background-image.jpg' with the actual path to your image */
            background-size: cover; /* Adjust as needed */
            background-position: center; /* Adjust as needed */
            background-repeat: no-repeat; 
            background-color : #fff;/* Adjust as needed */
            
        }

        /* Add any additional styles here */
        
        .index-header {
            /* Your existing styles for h2.index-header */
        }

        /* Add other existing styles here */

    </style>
</head>
<body>

<br/>
<br/>
<img src="https://padangkota.bps.go.id/backend/images/Header-Frontend-Besar-ind.png" class="img">
<h2 class="index-header">Selamat Datang <br>E-VOTING PEGAWAI TELADAN BPS KOTA PADANG<br></h2>
<style>
    .index-header {
        color: black;
        font-weight: bold;

    }
</style>
<br/>
<div class="row">
    <div class="col-md-4 col-md-offset-1">
    <br/>
        <div id="content-slider">
            <img src="./assets/img/logobps.png" class="img" alt="Slideshow 2">
            <img src="./assets/img/vote.png" class="img" alt="Slideshow 3" >
            
        </div>
    </div>
    <div class="col-md-6 form">
        <span class="info-login">Silahkan Login untuk dapat melakukan pemilihan</span>
        <style>
        .info-login{
            color: black;
        }
        </style>
        <br />
        <br />
        <form action="" method="post">
            <div class="form-group">
                <label style="color: black;">Masukkan NIP :</label>
                <input type="number" class="form-control" placeholder="username" required="username" name="username"/>
                
            </div>
            <!-- <div class="form-group">
                <label style="color: black;">Masukkan Password :</label>
                <input type="number" class="form-control" placeholder="password" required="password" name="password"/>
                
            </div> -->

            <br />
            <div class="row">
            
                <div class="text-right" style="padding-right:15px;">
                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Login User">
                </div>
                <div class="text-right" style="margin-top:3px;padding-right:15px;">
                    <a href="admin/" class="btn btn-warning btn-lg">Login Admin</a>
                </div>
            </div>
        </form>
        
    </div>
</div>
