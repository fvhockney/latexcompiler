<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>

      <form method="POST" action="/compile">
        @csrf
          <input type="text" name="input[from]" value="" placeholder="From">
          <input type="text" name="input[fromPhone]" value="" placeholder="From Phone">
          <input type="text" name="input[fromEmail]" value="" placeholder="From Email">
          <input type="text" name="input[fromPlace]" value="" placeholder="From Place">
          <input type="text" name="input[fromStreet]" value="" placeholder="From Street">
          <input type="text" name="input[fromCity]" value="" placeholder="From City">
          <input type="text" name="input[fromState]" value="" placeholder="From State">
          <input type="text" name="input[fromZip]" value="" placeholder="From ZIP">
          <input type="text" name="input[toName]" value="" placeholder="To Name">
          <input type="text" name="input[toStreet]" value="" placeholder="To Street">
          <input type="text" name="input[toCity]" value="" placeholder="To City">
          <input type="text" name="input[toState]" value="" placeholder="To State">
          <input type="text" name="input[toZip]" value="" placeholder="To ZIP">
          <input type="text" name="input[subject]" value="" placeholder="Subject">
          <input type="text" name="input[opening]" value="" placeholder="Opening">
          <input type="text" name="input[closing]" value="" placeholder="Closing">

        <button type="submit" class="btn btn-primary">Compile</button>
      </form>


    </body>
</html>
