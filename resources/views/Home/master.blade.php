<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Krub' rel='stylesheet'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <title>@yield('title')</title>
    </head>
    <body>
        <section id="navbar">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <a id="site-logo" class="navbar-brand" href="#">SIMPLE <span id="todo-text">Todo</span></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link @yield('todolist')" href="{{route('showHome')}}">Todo List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @yield('completedtodolist')" href="{{route('showCompletedTodo')}}">Completed Todo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @yield('about')" href="{{route('showAbout')}}">About</a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <a href="{{route('logout')}}" class="btn btn-outline-info my-2 my-sm-0">Logout</a>
                </form>
              </div>
            </nav>
        </section>

        <section class="container-fluid">
            <div class="row">
                <div class="col-12" id="page-content">
                    @yield('content')
                </div>
            </div>
        </section>



        <!-- Optional JavaScript -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
