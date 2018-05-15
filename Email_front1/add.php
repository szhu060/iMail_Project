<?php
/**
 * Created by PhpStorm.
 * User: shizhu
 * Date: 2018-04-09
 * Time: 11:49 AM
 */

    echo "add.php😁😁🎳";

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="jumbotron">
    <h1 class="display-4">Let us add a new template</h1>
        <p class="lead">This is a resful API Demo to add an email template to back-end server by Ajax and Json</p>
       <hr class="my-4">
            <div class="form-group">
                <label for="">Content:</label>
                <textarea type="text" class="form-control" id="tcontent" rows="8" placeholder="Enter template name"></textarea>
            </div>
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text" class="form-control" id="tname" placeholder="Enter template name">
            </div>
            <div class="form-group">
                <label for="">Variable Names:(seperate by :)</label>
                <input type="text" class="form-control" id="tvar" placeholder="Enter template variable names">

            </div>
            <p class="lead">
                <button class="btn btn-primary btn-lg" id="add_template">Add Template</button>
            </p>
        <h1 class="lead" id="info"></h1>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $('#add_template').click(function(){
        var content = $('#tcontent').val();
        var name = $('#tname').val();
        var vars = $('#tvar').val();
        $.post(
            "http://192.168.33.10/Email/templates/save",
            {
                "content" : content,
                "name" : name,
                "var" : vars
            },
            function(data){
                $("#info").html(data.message);
                },
                "json"
            );
    });
</script>
</body>
</html>