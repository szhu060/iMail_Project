<?php
/**
 * Created by PhpStorm.
 * User: shizhu
 * Date: 2018-04-09
 * Time: 1:27 PM
 */
echo "send.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>SEND TEMPLATE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Let us send a new template</h1>
        <p class="lead">This is a resful API Demo to get all email template to send from back-end server by Ajax and Json</p>
        <hr class="my-4">
        <div class="content">

        </div>
        <h1 class="lead" id="info">

        </h1>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $.get(
        "http://192.168.33.10/Email/templates/get",
        function(data){
            $.each(data,function(key,value){
               var tname = value.name;
               var tvars = value.var;
               var tid = value.id;
               var tcontent = value.content;

               var htmlForEachTemplate =
                   `
                   <div>
                        <h3> Template Name: `+ tname +` </h3>
                        <label> Recipient:</label>
                        <input id="rcpt` +tid+`" class="rcpt form-control" type="text">
                        <button class="btn btn-primary tbutton" data-id="` +tid+ `">Send</button>
                   </div>
                   `;
                $('.content').append(htmlForEachTemplate);
            });
            $(".tbutton").click(function(e){
               var tid = $(this).data("id");
               var trcpt = $(this).prev(".rcpt").val();
               $.post(
                   "http://192.168.33.10/Email/send",
                   {
                       "id" :tid,
                       "rcpt" :trcpt
                   },
                   function(data){
                       $('#info').html(data.message);
                   },
                   'json'
               );
            });
        }

    );
</script>
</body>
</html>
