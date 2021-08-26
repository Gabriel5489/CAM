<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title><?=$this->renderSection('title')?></title>
  </head>
  <body>
      
      <?=$this->include('layout/headers/headerAlumno')?>
      <?=$this->renderSection('content')?>
      <?=$this->include('layout/footer/footer')?>
      
  </body>
  </html>