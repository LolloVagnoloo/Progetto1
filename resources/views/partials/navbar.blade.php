@php
    use Illuminate\Contracts\Auth\Guard;
@endphp
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid" style="display: flex; flex-wrap: nowrap;">
        <h1 style="font-size: 24px; font-weight: bold; display: inline-block; margin-right: auto;">Autonoleggio Vagnoli S.N.C</h1>
          <span class="navbar-toggler-icon"></span>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="nav-ul">
            <li class="nav-item" style="display: inline-block; margin-right: 10px;">
                <a aria-current="page" href='{{ route('home') }}' style="display: inline-block; padding: 10px 20px; border-radius: 20px; background-color: #007bff; color: #fff; text-decoration: none; transition: background-color 0.2s ease;">Home</a>
            </li>
            <li class="nav-item" style="display: inline-block; margin-right: 10px;">
                <a href='{{ route('catalogo') }}' style="display: inline-block; padding: 10px 20px; border-radius: 20px; background-color: #007bff; color: #fff; text-decoration: none; transition: background-color 0.2s ease;">Catalogo Auto</a>
            </li>
            <li class="nav-item" style="display: inline-block; margin-right: 10px;">
                <a href='{{ route('chi-siamo') }}' style="display: inline-block; padding: 10px 20px; border-radius: 20px; background-color: #007bff; color: #fff; text-decoration: none; transition: background-color 0.2s ease;">Chi Siamo</a>
            </li>





            @if (auth()->check())
                <label style="padding-right: 10px; font-weight: bold; font-size: 16px; color: #333;">{{ Auth::user()->username }}</label>
                @if (Auth::user()->role === 'client')
                    <button style="background-color: blue; color: white; border: none; padding: 10px 20px; cursor: pointer;" onmouseover="this.style.backgroundColor='darkblue'" onmouseout="this.style.backgroundColor='blue'" onclick="window.location.href='{{ route('area-personale') }}'">Area Personale</button>

                @elseif (Auth::user()->role === 'staff' || Auth::user()->role === 'admin')
                    <button style="background-color: blue; color: white; border: none; padding: 10px 20px; cursor: pointer;" onmouseover="this.style.backgroundColor='darkblue'" onmouseout="this.style.backgroundColor='blue'" onclick="window.location.href='{{ route('adminPanel') }}'">Pannello di Controllo</button>

                @endif

                        <form method="POST" action='{{ route('logout') }}' style="display: inline-flex; align-items: center;">
                            @csrf
                            <button id="logout-button"  style="background-color: red; color: white; border: none; padding: 10px 20px; cursor: pointer;" onmouseover="this.style.backgroundColor='darkred'" onmouseout="this.style.backgroundColor='red'" type="submit">Logout</button>
                        </form>

                @else

                <button onclick="window.location.href='{{ url('/register') }}'" style="background-color: blue; color: white; border: none; padding: 10px 20px; cursor: pointer;" onmouseover="this.style.backgroundColor='darkblue'" onmouseout="this.style.backgroundColor='blue'">Registrati</button>
                <button onclick="window.location.href='{{ url('/login') }}'" style="background-color: blue; color: white; border: none; padding: 10px 20px; cursor: pointer;" onmouseover="this.style.backgroundColor='darkblue'" onmouseout="this.style.backgroundColor='blue'">Login</button>

            @endif
        </div>
      </div>

</nav>
