<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail UMKM - {{ $umkm->nama_usaha }}</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 0 20px;
        }

        /* Hero Section */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-bottom: 30px;
        }

        .hero-text {
            max-width: 600px;
        }

        .hero-text h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }

        .hero-text p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 20px;
        }

        .hero-text .btn {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.1rem;
            display: inline-block;
            transition: background 0.3s ease;
        }

        .hero-text .btn:hover {
            background-color: #0056b3;
        }

        .hero-image img {
            max-width: 400px;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        /* Info Section - Modernized */
        .info-section {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
        }

        .info-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
            transition: transform 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
        }

        .info-card .icon {
            font-size: 30px;
            color: #007bff;
            margin-bottom: 15px;
        }

        .info-card h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .info-card p {
            font-size: 1rem;
            color: #666;
        }

        /* WhatsApp Button */
        .whatsapp-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25d366;
            color: white;
            border-radius: 50%;
            padding: 15px;
            font-size: 24px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .whatsapp-btn:hover {
            background-color: #128c7e;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
            }

            .hero-text {
                max-width: 100%;
            }

            .hero-image {
                margin-top: 20px;
            }

            .info-section {
                flex-direction: column;
            }

            .info-card {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- UMKM Details -->
    <div class="container">
        <a href="/" class="back-link" style="color: #007bff; text-decoration: none; font-size: 1rem; margin-bottom: 20px; display: inline-block;">&larr; Kembali ke Daftar UMKM</a>

        <!-- Hero Section: Image + Text -->
        <div class="hero">
            <div class="hero-text">
                <h1>{{ $umkm->nama_usaha }}</h1>
                <p>{{ $umkm->deskripsi }}</p>
                <a href="#" class="btn" onclick="alert('Silakan hubungi kontak UMKM ini!')">Hubungi Sekarang</a>
            </div>
            <div class="hero-image">
                <img src="{{ $umkm->gambar_usaha ? asset('storage/' . $umkm->gambar_usaha) : 'https://via.placeholder.com/600x400?text=No+Image' }}" 
                    alt="{{ $umkm->nama_usaha }}">
            </div>
        </div>

        <!-- Info Section -->
        <div class="info-section">
            <!-- Alamat Info -->
            <div class="info-card">
                <div class="icon">📍</div>
                <h3>Alamat</h3>
                <p>{{ $umkm->alamat ?? 'Belum tersedia' }}</p>
            </div>
            <!-- Kontak Info -->
            <div class="info-card">
                <div class="icon">📞</div>
                <h3>Kontak</h3>
                <p>{{ $umkm->kontak ?? 'Belum tersedia' }}</p>
            </div>
        </div>

        <!-- WhatsApp Button -->
        <div class="whatsapp-btn" onclick="window.location.href='https://wa.me/{{ $umkm->kontak }}';">
            <i class="fab fa-whatsapp"></i> 
        </div>
    </div>

</body>
</html>
