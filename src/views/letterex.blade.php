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

      @if (Session::has('success'))
        <div class="alert alert-success">
          <p><strong>Your PDF was made!!!</strong></p>
          <a href="{{ Session::get('success') }}" class="btn btn-primar btn-lg">View PDF</a>
        </div>
      @endif

      <form class="container my-5" method="POST" action="/compile">
        @csrf
        <p><span class="text-danger">*</span> All Fields Required</p>
        <fieldset class="mb-4">
          <legend>Sender Information/Address</legend>
          <div class="form-row">
            <div class="form-group col-sm col-md-6">
              <input class="form-control" type="text" name="input[from]" value="" placeholder="From" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-sm col-md-3">
              <input class="form-control" type="text" name="input[fromPhone]" value="" placeholder="From Phone" required>
            </div>
            <div class="form-group col-sm col-md-3">
              <input class="form-control" type="text" name="input[fromEmail]" value="" placeholder="From Email" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-sm col-md-6">
              <input class="form-control" type="text" name="input[fromStreet]" value="" placeholder="From Street" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-sm col-md-3">
              <input class="form-control" type="text" name="input[fromCity]" value="" placeholder="From City" required>
            </div>
            <div class="form-group col-sm col-md-1">
              <input class="form-control" type="text" name="input[fromState]" value="" placeholder="State" required>
            </div>
            <div class="form-group col-sm col-md-2">
              <input class="form-control" type="text" name="input[fromZip]" value="" placeholder="From ZIP" required>
            </div>
          </div>
        </fieldset>

        <fieldset class="my-4">
          <legend>Receiver's Information/Address</legend>
          <div class="form-row">
            <div class="form-group col-sm col-md-5">
              <input class="form-control" type="text" name="input[toName]" value="" placeholder="To Name" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-sm col-md-6">
              <input class="form-control" type="text" name="input[toStreet]" value="" placeholder="To Street" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-sm col-md-3">
              <input class="form-control" type="text" name="input[toCity]" value="" placeholder="To City" required>
            </div>
            <div class="form-group col-sm col-md-1">
              <input class="form-control" type="text" name="input[toState]" value="" placeholder="State" required>
            </div>
            <div class="form-group col-sm col-md-2">
              <input class="form-control" type="text" name="input[toZip]" value="" placeholder="To ZIP" required>
            </div>
          </div>
        </fieldset>

        <fieldset class="my-4">
          <legend>Letter Content</legend>
          <div class="form-row">
            <div class="form-group col-sm col-md-8">
              <input class="form-control" type="text" name="input[subject]" value="" placeholder="Subject" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-sm col-md-4">
              <input class="form-control" type="text" name="input[opening]" value="" placeholder="Opening" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col text-muted">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>

            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-sm col-md-3">
              <input class="form-control" type="text" name="input[closing]" value="" placeholder="Closing" required>
            </div>
            <div class="form-group col-sm col-md-3">
              <input class="form-control" type="text" name="input[fromPlace]" value="" placeholder="From Place" required>
            </div>
          </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Compile</button>
      </form>


    </body>
</html>
