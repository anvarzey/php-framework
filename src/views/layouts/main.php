<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
</head>

<body>

  <header>
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item is-size-4 has-text-weight-bold" href="/">
          Logo
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="/">
            Home
          </a>

          <a class="navbar-item" href="/contact">
            Contact
          </a>

        </div>
      </div>

      <div class="columns is-vcentered">
        <div class="column">
          <a href="/login" class="button">Login</a>
        </div>
        <div class="column">
          <a href="/signup" class="button is-primary">Sign up</a>
        </div>
      </div>
    </nav>
  </header>

  <div class="container">
    {{content}}
  </div>

</body>

</html>