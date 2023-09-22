{{-- <nav class="navbar" data-bs-theme="dark">
    <div class="topnav" >
        <a class="active" href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <div class="login-container">
          <form action="/action_page.php">
            <input type="text" placeholder="Username" name="username">
            <input type="text" placeholder="Password" name="psw">
            <button type="submit">Login</button>
          </form>
        </div>
      </div> 
</nav> --}}

<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#opciones">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- logo -->
    <a class="navbar-brand" href="#">
      <img src="http://www.tutorialesprogramacionya.com/imagenes/foto1.jpg" width="30" height="30" alt="">
    </a>
    
    <!-- enlaces -->
    <div class="collapse navbar-collapse" id="opciones">   
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Opción 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Opción 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Opción 3</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Opción 4</a>
        </li>            
      </ul>
    </div>


    <div class="login-container">
        <form action="/action_page.php">
          <input type="text" placeholder="Username" name="username">
          <input type="text" placeholder="Password" name="psw">
          <button type="submit">Login</button>
        </form>
      </div>
  </nav>