<?php

if (preg_match('/\/server\/(latest|10\.0)/i', $_SERVER['REQUEST_URI'])) {
  $rules = array(
    '/\/server\/(latest|10\.0)\/admin_manual\/configuration_(.*)/i' => '/server/$1/admin_manual/configuration/$2'
  );

  foreach($rules as $search => $replace) {
    if (preg_match($search, $_SERVER['REQUEST_URI'])) {
      $proto = isset($_SERVER['HTTPS']) ? 'https' : 'http';
      $name = $_SERVER['HTTP_HOST'];
      $path = preg_replace($search, $replace, $_SERVER['REQUEST_URI']);
      $location = "$proto://$name$path";

      header('HTTP/1.1 302 Moved Temporarily');
      header('Location: ' . $location);

      exit();
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">

    <title>Oops! You're lost.</title>

    <style>
      html,
      body {
        height: 100%;
        min-height: 100%;
        margin: 0;
        padding: 0;
      }

      body {
        cursor: default;
        font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        font-size: 0.875rem;
        font-weight: normal;
        line-height: 1.5;
        color: #383e4b;
        background-color: #f5f5f5;
      }

      h1 {
        font-size: 4.5rem;
        font-weight: 300;
        line-height: 1.1;
        float: left;
        margin: 0 1.5rem;
      }

      h4 {
        font-size: 1.5rem;
        padding: 0.7rem 0 0 0;
        margin: 0;
      }

      p {
        font-weight: 500;
        line-height: 1.1;
        color: #9da0a8;
        padding: 0;
        margin: 0;
      }

      .wrapper {
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-60%);
        -ms-transform: translateY(-60%);
        transform: translateY(-60%);
      }

      .container {
        width: 550px;
        margin: 0 auto;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <h1>
          404
        </h1>

        <h4>
          Oops! You're lost.
        </h4>

        <p>
          The page you are looking for was not found.
        </p>
      </div>
    </div>
  </body>
</html>
