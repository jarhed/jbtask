<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    <title>Jacob Bailey - Company Directory</title>
  </head>
  <body>
    <div class="container" id="app">
<!--       
      <div class="header">
        <img src="img/logo.svg">
      </div>
 -->
      <main-layout></main-layout>
    </div>
    <script src="js/app.js"></script>
  </body>
</html>
