
 <nav class="nav">

            <div class="brand">
                <img src="" alt="...">
                <p>
                    
                    <span>SMANIG</span>
                </p>
            </div>

            <hr class="line">

            <ul class="list">
              <a href="/dashboard">
                <li>
                    <i class="fa-solid fa-home"></i>
                    <span>Dashboard</span>
                </li>
              </a>
              <a href="/users">
                <li>
                    <i class="fa-solid fa-user"></i>
                    <span>Users</span>
                </li>
              </a>
              <a href="/surats">
                <li>
                    <i class="fa-solid fa-box"></i>
                    <span>Surat</span>
                </li>
              </a>
              <a href="/buku">
                <li>
                    <i class="fa-solid fa-box"></i>
                    <span>Buku</span>
                </li>
              </a>
              <a href="/artikel">
                <li>
                    <i class="fa-solid fa-box"></i>
                    <span>Artikel</span>
                </li>
              </a>
                <li>
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Charts</span>
                </li>
                <li>
                    <i class="fa-solid fa-phone"></i>
                    <span>Support</span>
                </li>

                <hr class="line">
                
                <li>
                  <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      @method('POST')
                      
                      <span>
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <button type="submit">Logout</button>
                      </span>
                      
                  </form>
                </li>
                
                <li class="tutup">
                  <span>Tutup</span>
                </li>

            </ul>

        </nav>
        <button class="menu">Menu</button>

<script>
const menu = document.querySelector('.menu');
const nav = document.querySelector('.nav');
const tutup = document.querySelector('.tutup');
menu.addEventListener('click', ()=>{
nav.style.display = 'block';
});
tutup.addEventListener('click', ()=>{
nav.style.display = 'none';
});
</script>