<?php include 'nav.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>TravelEase - Book Hotels & Trips</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, sans-serif;
    }

    body {
      background: linear-gradient(270deg, #a1c4fd, #c2e9fb, #a1c4fd);
      background-size: 600% 600%;
      animation: bgAnimation 20s ease infinite;
      color: #333;
      min-height: 100vh;
      overflow-x: hidden;
    }

    @keyframes bgAnimation {
      0% {background-position: 0% 50%;}
      50% {background-position: 100% 50%;}
      100% {background-position: 0% 50%;}
    }

    header {
      background: #004080;
      color: white;
      padding: 15px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      position: relative;
      z-index: 10;
    }

    header h1 {
      font-family: 'Poppins', sans-serif;
      font-size: 1.8em;
      font-weight: 600;
      cursor: pointer;
      animation: bounce 3s infinite;
      user-select: none;
      letter-spacing: 1.5px;
      text-shadow: 0 0 6px #70c1ff;
      transition: color 0.3s;
    }

    header h1:hover {
      color: #a1c4fd;
      text-shadow: 0 0 15px #fff;
    }

    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-6px); }
    }

    nav a {
      color: white;
      margin-left: 15px;
      text-decoration: none;
      font-weight: 500;
      font-size: 0.95em;
      position: relative;
      transition: color 0.3s;
      cursor: pointer;
    }

    nav a::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      background: #70c1ff;
      bottom: -3px;
      left: 0;
      transition: width 0.3s;
    }

    nav a:hover {
      color: #70c1ff;
    }

    nav a:hover::after {
      width: 100%;
    }

    #loginModal {
      display: none; 
      position: fixed; 
      z-index: 100; 
      left: 0; top: 0; 
      width: 100%; height: 100%; 
      overflow: auto; 
      background-color: rgba(0,0,0,0.6);
    }
    #loginModal .modal-content {
      background-color: #fefefe;
      margin: 10% auto; 
      padding: 20px; 
      border-radius: 15px;
      width: 320px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
      position: relative;
    }
    #loginModal .close {
      position: absolute;
      right: 15px;
      top: 10px;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
      color: #004080;
    }
    #loginModal input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border-radius: 8px;
      border: 1.5px solid #004080;
      font-size: 1em;
    }
    #loginModal button {
      width: 100%;
      padding: 12px;
      background-color: #004080;
      color: white;
      border: none;
      border-radius: 10px;
      font-weight: 600;
      cursor: pointer;
      font-size: 1em;
      margin-top: 10px;
    }
    #loginModal button:hover {
      background-color: #0066cc;
    }
    #welcomeMessage {
      color: #fff;
      margin-left: 15px;
      font-weight: 600;
      font-size: 1em;
    }

    section.hero {
      /* background-image: url(https://www.shutterstock.com/image-photo/distant-hills-hilly-steppe-curvy-260nw-1149102500.jpg); */
      text-align: center;
      padding: 60px 20px 40px;
      font-size: 2em;
      font-weight: 600;
      color: #004080;
      position: relative;
    }
    .hero {
      background: url("https://live.staticflickr.com/928/27646544778_70b81237be_b.jpg") no-repeat center center/cover;
      height: 55vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      text-align: center;
      position: relative;
    }
    .floating-icon {
      font-size: 3em;
      animation: floatAnim 6s ease-in-out infinite;
      margin: 0 10px;
      display: inline-block;
    }
    .floating-icon:nth-child(1) { animation-delay: 0s; }
    .floating-icon:nth-child(2) { animation-delay: 1.5s; }
    .floating-icon:nth-child(3) { animation-delay: 3s; }
    .floating-icon:nth-child(4) { animation-delay: 4.5s; }

    @keyframes floatAnim {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-15px); }
    }

    .search-box {
      display: flex;
      justify-content: center;
      gap: 15px;
      padding: 20px;
      flex-wrap: wrap;
      background: rgba(255,255,255,0.8);
      max-width: 900px;
      margin: 0 auto 40px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .search-box input, .search-box select {
      padding: 12px;
      border: 1.5px solid #004080;
      border-radius: 10px;
      font-size: 1em;
      min-width: 150px;
    }

    .search-box button {
      background-color: #004080;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 12px 25px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .search-box button:hover {
      background-color: #0066cc;
    }

    .section {
      max-width: 1100px;
      margin: 0 auto 50px;
      padding: 0 20px;
    }
    .section h3 {
      color: #004080;
      font-weight: 700;
      margin-bottom: 20px;
      font-size: 1.8em;
    }

    .cards {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      justify-content: center;
    }
    .card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow: hidden;
      max-width: 300px;
      cursor: pointer;
      transition: transform 0.3s;
    }
    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.2);
    }
    .card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-bottom: 1.5px solid #004080;
    }
    .card-content {
      padding: 15px;
      color: #004080;
    }
    .card-content h4 {
      margin-bottom: 10px;
      font-weight: 700;
    }
    .card-content p {
      font-size: 0.95em;
      line-height: 1.3em;
    }

    .about {
      background: rgba(255, 255, 255, 0.9);
      max-width: 900px;
      margin: 0 auto 40px;
      padding: 30px 25px;
      border-radius: 15px;
      color: #004080;
      font-size: 1.1em;
      font-weight: 500;
      text-align: center;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    footer {
      background: #004080;
      color: white;
      text-align: center;
      padding: 20px 15px;
      font-weight: 600;
      font-size: 1em;
      letter-spacing: 1px;
    }
    .logo-img {
  height: 40px;
  width: auto;
  object-fit: contain;
}
  </style>
</head>
<body>

  <header>
      <div style="display: flex; align-items: center; gap: 10px;">
      <img src="assets/POV (1).png" class="logo-img" alt="TravelEase Logo" />

    <h1 id="logo">TravelEase</h1>
    <nav>
      <a href="#">Hotels</a>
      <a href="#">Flights</a>
      <a href="#">Packages</a>
      <a href="#">Villas</a>
      <a href="#">Contact</a>
      <a href="#" id="loginBtn">Login</a>
      <span id="welcomeMessage" style="display:none;"></span>
      <a href="#" id="logoutBtn" style="display:none; color:#70c1ff; margin-left:10px;">Logout</a>
    </nav>
  </header>

  <section class="hero">
    <h2>  Plan Dream Vacation</h2>
  </section>

  <section class="search-box">
    <input type="text" id="destination" placeholder="Enter Destination" />
    <input type="date" id="checkin" />
    <input type="date" id="checkout" />
    <select id="guests">
      <option>1 Room, 2 Adults</option>
      <option>2 Rooms, 4 Adults</option>
      <option>3 Rooms, 6 Adults</option>
    </select>
    <button onclick="search()">Search</button>
  </section>
   <section class="section">
    <h3>Trending Hotel</h3>
    <div class="cards">
      <div class="card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_LBgRTFFWINzeyhAz9U9UE4WeScb6SzJa1g&s" alt="Beach Vacation" />
        <div class="card-content">
          <h4>New delhi</h4>
          <p>The Imperial New Delhi is India's iconic heritage luxury hotel, creating legacy moments.</p>
        </div>
      </div>
      <div class="card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7Faiu9XiydWPjcOTpmDAknAdCGFSXZqlE2g&s" alt="Mountain Retreat" />
        <div class="card-content">
          <h4>Chennai</h4>
          <p>The 5-star Trident Chennai features an outdoor pool, pampering spa treatments and 24-hour room service.</p>
        </div>
      </div>
      <div class="card">
        <img src="https://picsum.photos/id/1011/600/400" alt="City Break" />
        <div class="card-content">
          <h4>Goa</h4>
          <p>Goa offers a vast array of accommodation choices, from high-end luxury hotels.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <h3>Vacation Spots</h3>
    <div class="cards">
      <div class="card">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="Beach Vacation" />
        <div class="card-content">
          <h4>Malibu Beach</h4>
          <p>Sun, sand, and surf at the iconic Malibu beaches.</p>
        </div>
      </div>
      <div class="card">
        <img src="https://images.unsplash.com/photo-1494526585095-c41746248156?auto=format&fit=crop&w=600&q=80" alt="Mountain Retreat" />
        <div class="card-content">
          <h4>Rocky Mountain Retreat</h4>
          <p>Escape into nature with breathtaking mountain views.</p>
        </div>
      </div>
      <div class="card">
        <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=600&q=80" alt="City Break" />
        <div class="card-content">
          <h4>New York City</h4>
          <p>The city that never sleeps with endless attractions.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <h3>Family Planning Trips</h3>
    <div class="cards">
      <div class="card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFnr7DUiO4Qw3cnOL2d5Ag1QemRHHY6VCE7lKKN_O-twQFur-AlKIXF6NjgOux7IrNnAI&usqp=CAU" alt="Theme Park Fun" />
        <div class="card-content">
          <h4>Disneyland</h4>
          <p>Magic and adventure for the entire family.</p>
        </div>
      </div>
      <div class="card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSG_YQX_SfqrtZbYO7yKqVfq3s5FwmHasWTow&s" alt="Safari" />
        <div class="card-content">
          <h4>African Safar</h4>
          <p>Hotel Africa which used to be a notable landmark historical area in Liberia.</p>
        </div>
      </div>
      <div class="card">
        <img src="https://www.shutterstock.com/image-photo/family-five-enters-hotel-lobby-260nw-2140663455.jpg" alt="Beach Family" />
        <div class="card-content">
          <h4>Hawaii Family Resort</h4>
          <p>Beachfront fun with kid-friendly activities and resorts.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <h3>Honeymoon Specials</h3>
    <div class="cards">
      <div class="card">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="Bali Romantic Escape" />
        <div class="card-content">
          <h4>Bali Romantic Escape</h4>
          <p>Private villas with pools and candlelight dinners in Bali.</p>
        </div>
      </div>
      <div class="card">
        <img src="https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?auto=format&fit=crop&w=600&q=80" alt="Swiss Alps Retreat" />
        <div class="card-content">
          <h4>Swiss Alps Retreat</h4>
          <p>Snowy mountains, cozy chalets and scenic train rides.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="about">
    <h3>About TravelEase</h3>
    <p>Your trusted partner in discovering the best hotels, flights, villas, and unforgettable vacations tailored for you and your family.</p>
  </section>

  <footer>
    &copy; 2025 TravelEase. All rights reserved.<br>
    <section class="contacts">
    <p>E-mail:travelease123@gmail.com</p>
    <p>Phone No: 4562810263</p>
  </section>
  </footer>

  <!-- Login Modal -->
  <div id="loginModal">
    <div class="modal-content">
      <span class="close" id="closeLogin">&times;</span>
      <h3 style="color:#004080; text-align:center; margin-bottom:15px;">Login to TravelEase</h3>
      <input type="text" id="username" placeholder="Username" autocomplete="username" />
      <input type="password" id="password" placeholder="Password" autocomplete="current-password" />
      <button id="submitLogin">Login</button>
    </div>
  </div>

  <script>
    function search() {
      const destination = document.getElementById('destination').value;
      const checkin = document.getElementById('checkin').value;
      const checkout = document.getElementById('checkout').value;
      const guests = document.getElementById('guests').value;
      if (!destination || !checkin || !checkout) {
        alert('Please fill in destination and dates.');
        return;
      }
      alert(`Searching for hotels in ${destination} from ${checkin} to ${checkout} for ${guests}`);
    }

    // Login Modal handling
    const loginBtn = document.getElementById('loginBtn');
    const loginModal = document.getElementById('loginModal');
    const closeLogin = document.getElementById('closeLogin');
    const submitLogin = document.getElementById('submitLogin');
    const welcomeMessage = document.getElementById('welcomeMessage');
    const logoutBtn = document.getElementById('logoutBtn');

    loginBtn.addEventListener('click', (e) => {
      e.preventDefault();
      loginModal.style.display = 'block';
    });

    closeLogin.addEventListener('click', () => {
      loginModal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
      if (e.target === loginModal) {
        loginModal.style.display = 'none';
      }
    });

    submitLogin.addEventListener('click', () => {
      const username = document.getElementById('username').value.trim();
      const password = document.getElementById('password').value.trim();

      if (username === '' || password === '') {
        alert('Please enter both username and password.');
        return;
      }

      // Dummy authentication
      if (username === 'user' && password === 'password') {
        loginModal.style.display = 'none';
        welcomeMessage.textContent = `Welcome, ${username}!`;
        welcomeMessage.style.display = 'inline';
        loginBtn.style.display = 'none';
        logoutBtn.style.display = 'inline';
        document.getElementById('username').value = '';
        document.getElementById('password').value = '';
      } else {
        alert('Invalid username or password. Try "user" and "password"');
      }
    });

    logoutBtn.addEventListener('click', (e) => {
      e.preventDefault();
      welcomeMessage.style.display = 'none';
      loginBtn.style.display = 'inline';
      logoutBtn.style.display = 'none';
    });
  </script>

</body>
</html>
