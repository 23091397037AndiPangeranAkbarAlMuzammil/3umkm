<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Homepage - Daftar UMKM</title>
    <style>
        /* Reset dasar untuk margin dan padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Style */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding: 20px;
        }

        /* Heading */
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .navbar h2 {
            color: white;
            font-size: 24px;
        }

        .navbar .auth-btns a {
            color: white;
            cursor: pointer;
            background-color: #28a745;
            padding: 8px 20px;
            border-radius: 5px;
            margin-left: 10px;
            font-size: 14px;
            text-align: center;
            transition: background-color 0.3s ease;
            display: inline-block;
            text-decoration: none;
            user-select: none;
        }

        .navbar .auth-btns a:hover {
            background-color: #218838;
        }

        /* Container untuk Card */
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 0 20px;
        }

        /* Card Style */
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #eee;
            display: block;
        }

        .card-body {
            padding: 15px;
        }

        .card-body h3 {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }

        .card-body p {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .card-body .btn {
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            text-align: center;
            display: inline-block;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .card-body .btn:hover {
            background-color: #0056b3;
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            position: relative;
            width: 80%;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .search-bar input {
            width: 100%;
            padding: 12px 40px 12px 15px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .search-bar input:focus {
            border-color: #007bff;
        }

        .search-bar .search-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            fill: #888;
            pointer-events: none;
        }

        /* Pesan jika tidak ada hasil pencarian */
        #noResults {
            display: none;
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-style: italic;
            font-size: 16px;
        }

        /* Modal Overlay */
        .modal {
            display: none; /* default hidden */
            position: fixed;
            z-index: 999;
            left: 0; top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.6);
            justify-content: center;
            align-items: center;
        }

        /* Modal Content Box */
        .modal-content {
            background: white;
            padding: 30px 25px;
            width: 90%;
            max-width: 400px;
            border-radius: 8px;
            position: relative;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        /* Close button */
        .close-btn {
            position: absolute;
            right: 15px;
            top: 10px;
            font-size: 25px;
            font-weight: bold;
            color: #333;
            cursor: pointer;
            user-select: none;
        }

        /* Modal form styling */
        .modal-content form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #444;
        }

        .modal-content form input {
            width: 100%;
            padding: 8px 10px;
            margin-top: 6px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .modal-content form button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .modal-content form button:hover {
            background-color: #218838;
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            .navbar h2 {
                font-size: 20px;
            }

            .navbar .auth-btns a {
                padding: 6px 12px;
                font-size: 12px;
            }

            .card-body h3 {
                font-size: 16px;
            }

            .card-body p {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar with Sign In and Sign Up triggers -->
    <div class="navbar">
        <h2>3-UMKM</h2>
        <div class="auth-btns">
            <a href="javascript:void(0)" onclick="openModal('loginModal')">Sign In</a>
            <a href="javascript:void(0)" onclick="openModal('registerModal')">Sign Up</a>
        </div>
    </div>

    <h1>Daftar UMKM</h1>

    <!-- Search Bar -->
    <div class="search-bar">
        <input type="text" id="search" autocomplete="off" placeholder="Cari UMKM..." />
        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M10 2a8 8 0 105.292 14.292l5.707 5.707 1.414-1.414-5.707-5.707A8 8 0 0010 2zm0 2a6 6 0 110 12 6 6 0 010-12z"/>
        </svg>
    </div>

    <!-- UMKM List in Cards -->
    <div class="container" id="umkmCards">
        @foreach ($umkms as $umkm)
        <div class="card">
            <img src="{{ $umkm->gambar_usaha ? asset('storage/' . $umkm->gambar_usaha) : 'https://via.placeholder.com/300x200?text=No+Image' }}" alt="{{ $umkm->nama_usaha }}">
            <div class="card-body">
                <h3>{{ $umkm->nama_usaha }}</h3>
                <p>{{ Str::limit($umkm->deskripsi, 100) }}</p>
                <a href="/umkm/{{ $umkm->id }}" class="btn">Lihat Detail</a>

            </div>
        </div>
        @endforeach
    </div>

    <p id="noResults">UMKM tidak ditemukan.</p>

    <!-- Login Modal -->
    <div id="loginModal" class="modal" onclick="closeModal(event, 'loginModal')">
        <div class="modal-content" onclick="event.stopPropagation()">
            <span class="close-btn" onclick="closeModal(null, 'loginModal')">×</span>
            <h2>Sign In</h2>
            <form method="POST" action="/login">
                @csrf
                <label for="loginEmail">Email</label>
                <input type="email" id="loginEmail" name="email" required />
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="password" required />
                <button type="submit">Sign In</button>
            </form>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal" onclick="closeModal(event, 'registerModal')">
        <div class="modal-content" onclick="event.stopPropagation()">
            <span class="close-btn" onclick="closeModal(null, 'registerModal')">&times;</span>
            <h2>Sign Up</h2>
            <form method="POST" action="/register">
                @csrf
                <label for="registerName">Name</label>
                <input type="text" id="registerName" name="name" required />
                <label for="registerEmail">Email</label>
                <input type="email" id="registerEmail" name="email" required />
                <label for="registerPassword">Password</label>
                <input type="password" id="registerPassword" name="password" required />
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>

<script>
    // Fungsi pencarian UMKM dengan feedback jika tidak ada hasil
    document.getElementById('search').addEventListener('input', function(event) {
        let query = event.target.value.toLowerCase();
        let cards = document.querySelectorAll('.card');
        let anyVisible = false;

        cards.forEach(card => {
            let title = card.querySelector('h3').textContent.toLowerCase();
            let isVisible = title.includes(query);
            card.style.display = isVisible ? '' : 'none';
            if (isVisible) anyVisible = true;
        });

        document.getElementById('noResults').style.display = anyVisible ? 'none' : 'block';
    });

    // Open modal function
    function openModal(id) {
        document.getElementById(id).style.display = 'flex';
    }

    // Close modal function: 
    // Close if clicked outside modal-content or on close button
    function closeModal(event, id) {
        if (!event || event.target.classList.contains('modal') || event.target.classList.contains('close-btn')) {
            document.getElementById(id).style.display = 'none';
        }
    }

    // Optional: close modals on Escape key
    document.addEventListener('keydown', function(e) {
        if(e.key === "Escape") {
            ['loginModal', 'registerModal'].forEach(id => {
                let modal = document.getElementById(id);
                if(modal.style.display === 'flex') {
                    modal.style.display = 'none';
                }
            });
        }
    });
</script>
</body> 
</html>
