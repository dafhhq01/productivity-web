<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <title>TrackApp - Platform Produktivitas & Keuangan</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&family=Playfair+Display:ital@1&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --font-display: 'Space Grotesk', sans-serif;
      --font-serif: 'Playfair Display', serif;
      --font-body: 'Inter', sans-serif;
      
      --bg-white: #ffffff;
      --bg-muted: #f5f5f5;
      --text-ink: #0a0f1a;
      --text-gray: #666666;
      --border-color: #e5e5e5;
      
      --sky-blue-1: #6ba3d6;
      --sky-blue-2: #95c4ea;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      background-color: var(--bg-white);
      color: var(--text-ink);
      font-family: var(--font-body);
      -webkit-font-smoothing: antialiased;
      overflow-x: hidden;
    }

    .border-b { border-bottom: 1px solid var(--border-color); }
    .border-r { border-right: 1px solid var(--border-color); }
    .border-t { border-top: 1px solid var(--border-color); }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 40px;
      height: 72px;
      font-family: var(--font-display);
      position: sticky;
      top: 0;
      background-color: var(--bg-white);
      z-index: 100;
    }

    .brand {
      display: flex; align-items: center; gap: 12px;
      font-weight: 700; font-size: 20px; letter-spacing: -0.5px;
    }

    .brand-icon {
      width: 24px; height: 24px;
      display: grid; grid-template-columns: 1fr 1fr; gap: 2px;
    }
    .brand-icon div { background-color: var(--text-ink); }
    .brand-icon div:nth-child(2) { opacity: 0; }

    .nav-links {
      display: flex; gap: 32px;
      font-size: 13px; font-weight: 500; text-transform: uppercase;
    }
    
    .nav-links a { text-decoration: none; color: var(--text-ink); transition: opacity 0.2s; }
    .nav-links a:hover { opacity: 0.6; }

    .nav-actions .btn-ghost {
      font-family: var(--font-display);
      padding: 10px 20px;
      border: 1px solid var(--text-ink);
      background: transparent;
      font-size: 12px; font-weight: 700;
      text-transform: uppercase;
      cursor: pointer; transition: 0.2s;
      text-decoration: none;
      display: inline-block;
      color: var(--text-ink);
    }
    .nav-actions .btn-ghost:hover { background: var(--text-ink); color: var(--bg-white); }

    .hero {
      display: grid;
      grid-template-columns: 1fr 1fr;
      min-height: calc(100vh - 72px);
    }

    .hero-content {
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 80px;
      position: relative;
    }

    .hero-eyebrow {
      font-family: var(--font-display);
      font-size: 24px; font-weight: 700;
      margin-bottom: 32px; text-align: center;
    }

    h1 {
      font-family: var(--font-display);
      font-size: clamp(36px, 4vw, 64px);
      line-height: 1.1;
      font-weight: 400;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: -1px;
    }

    h1 .serif {
      font-family: var(--font-serif);
      font-style: italic;
      text-transform: lowercase;
      font-size: clamp(40px, 4.5vw, 72px);
      display: block;
      margin: -4px 0;
    }

    .hero-desc {
      text-align: center;
      font-size: 14px;
      line-height: 1.6;
      max-width: 400px;
      margin: 32px auto 40px;
      color: var(--text-gray);
    }

    .hero-cta {
      display: flex; gap: 16px; justify-content: center;
      flex-wrap: wrap;
    }

    .btn-solid {
      background-color: var(--text-ink); color: var(--bg-white);
      border: none; padding: 16px 32px;
      font-family: var(--font-display); font-size: 12px;
      font-weight: 700; text-transform: uppercase; letter-spacing: 1px;
      cursor: pointer; transition: 0.2s;
      text-decoration: none; display: inline-block;
    }
    .btn-solid:hover { background-color: #333; }

    .btn-outline {
      background-color: transparent; color: var(--text-ink);
      border: 1px solid var(--border-color); padding: 16px 32px;
      font-family: var(--font-display); font-size: 12px;
      font-weight: 700; text-transform: uppercase; letter-spacing: 1px;
      cursor: pointer; transition: 0.2s;
      text-decoration: none; display: inline-block;
    }
    .btn-outline:hover { border-color: var(--text-ink); }

    .trusted-by {
      position: absolute; bottom: 40px; left: 0; right: 0;
      text-align: center;
    }
    .trusted-by p {
      font-family: var(--font-display); font-size: 10px;
      text-transform: uppercase; letter-spacing: 1px; color: var(--text-gray);
      margin-bottom: 16px;
    }
    .logos {
      display: flex; justify-content: center; gap: 32px; opacity: 0.4;
      font-family: var(--font-display); font-weight: 700; font-size: 14px;
    }

    .hero-visual {
      background: linear-gradient(180deg, var(--sky-blue-1) 0%, var(--sky-blue-2) 100%);
      position: relative;
      display: flex; justify-content: center; align-items: center;
      overflow: hidden;
    }

    .cloud-svg {
      position: absolute; top: 0; left: 0; width: 100%; height: 100%;
      opacity: 0.4; filter: blur(20px); mix-blend-mode: overlay;
    }

    .retro-pc {
      width: 280px; height: auto;
      filter: drop-shadow(0 32px 64px rgba(0,10,40,0.3));
      animation: float 6s ease-in-out infinite;
      z-index: 2;
    }

    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
      100% { transform: translateY(0px); }
    }

    .glass-card {
      position: absolute; bottom: 60px; left: 60px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(16px);
      border: 1px solid rgba(255,255,255,0.2);
      padding: 32px; width: 280px; color: var(--bg-white);
      z-index: 3;
    }
    
    .glass-icon { display: flex; flex-wrap: wrap; width: 24px; gap: 2px; margin-bottom: 24px; }
    .glass-icon span { width: 10px; height: 10px; background: white; }
    .glass-icon span:nth-child(2) { opacity: 0; }

    .glass-card h3 {
      font-family: var(--font-display); font-size: 13px;
      font-weight: 500; letter-spacing: 1px; margin-bottom: 8px;
    }
    .glass-card p { font-size: 12px; line-height: 1.5; opacity: 0.8; }

    .divider-bar {
      height: 48px; background-color: var(--bg-white);
      display: flex; justify-content: space-between; align-items: center;
      padding: 0 40px; border-bottom: 1px solid var(--border-color);
      font-family: var(--font-display); font-size: 10px;
      text-transform: uppercase; letter-spacing: 2px; color: var(--text-gray);
    }
    .divider-bar .box { width: 6px; height: 6px; background: var(--border-color); }

    .features { padding: 80px 40px; background-color: var(--bg-white); }

    .section-header { text-align: center; margin-bottom: 64px; }
    .section-header h2 {
      font-family: var(--font-display); font-size: clamp(24px, 2vw, 32px);
      font-weight: 400; text-transform: uppercase; letter-spacing: -0.5px;
      max-width: 600px; margin: 0 auto; line-height: 1.3;
    }
    .section-header h2 .serif {
      font-family: var(--font-serif); font-style: italic;
      text-transform: lowercase; display: inline;
    }

    .feature-grid {
      display: grid; grid-template-columns: 1fr 1fr; gap: 24px;
      max-width: 1200px; margin: 0 auto;
    }

    .feature-card {
      background-color: var(--bg-muted);
      border: 1px solid var(--border-color);
      display: flex; flex-direction: column;
    }

    .feature-illus {
      height: 320px; display: flex; justify-content: center; align-items: center;
      position: relative; overflow: hidden; border-bottom: 1px solid var(--border-color);
    }

    .iso-svg { width: 70%; height: 70%; stroke: #1a1a1a; stroke-width: 0.5px; fill: none; }

    .feature-text { padding: 32px; }
    .feature-text h3 {
      font-family: var(--font-display); font-size: 14px;
      font-weight: 700; text-transform: uppercase; margin-bottom: 8px;
    }
    .feature-text p { font-size: 13px; color: var(--text-gray); line-height: 1.5; }

    .pricing { padding: 80px 40px; background-color: var(--bg-white); }
    .pricing-grid {
      display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 0;
      max-width: 1200px; margin: 0 auto;
      border: 1px solid var(--border-color);
    }

    .pricing-card {
      background-color: var(--bg-white);
      padding: 48px 32px;
      display: flex; flex-direction: column;
      position: relative;
    }
    .pricing-card:not(:last-child) { border-right: 1px solid var(--border-color); }

    .pricing-card.highlight {
      background-color: var(--text-ink);
      color: var(--bg-white);
    }
    .pricing-card.highlight h3,
    .pricing-card.highlight .price,
    .pricing-card.highlight .feature-list li { color: var(--bg-white); }

    .pricing-tier {
      font-family: var(--font-display);
      font-size: 11px; font-weight: 700;
      text-transform: uppercase; letter-spacing: 1px;
      margin-bottom: 16px;
    }

    .price {
      font-family: var(--font-display);
      font-size: 48px; font-weight: 700;
      margin-bottom: 8px;
    }
    .price-old {
      font-size: 24px; text-decoration: line-through;
      opacity: 0.5; margin-left: 8px;
    }

    .price-desc {
      font-size: 13px; color: var(--text-gray);
      margin-bottom: 32px; line-height: 1.5;
    }
    .pricing-card.highlight .price-desc { color: rgba(255,255,255,0.7); }

    .feature-list {
      list-style: none; margin-bottom: 40px;
      flex-grow: 1;
    }
    .feature-list li {
      font-size: 13px; padding: 12px 0;
      border-bottom: 1px solid var(--border-color);
      color: var(--text-gray);
    }
    .pricing-card.highlight .feature-list li {
      border-bottom-color: rgba(255,255,255,0.2);
      color: rgba(255,255,255,0.9);
    }

    .btn-pricing {
      width: 100%;
      padding: 16px 32px;
      font-family: var(--font-display);
      font-size: 12px; font-weight: 700;
      text-transform: uppercase; letter-spacing: 1px;
      cursor: pointer; transition: 0.2s;
      text-decoration: none; text-align: center;
      display: block;
    }
    .btn-pricing.solid {
      background-color: var(--text-ink);
      color: var(--bg-white);
      border: 1px solid var(--text-ink);
    }
    .btn-pricing.solid:hover { background-color: #333; }

    .btn-pricing.solid-white {
      background-color: var(--bg-white);
      color: var(--text-ink);
      border: 1px solid var(--bg-white);
    }
    .btn-pricing.solid-white:hover { background-color: #f5f5f5; }

    .btn-pricing.outline {
      background-color: transparent;
      color: var(--text-ink);
      border: 1px solid var(--border-color);
    }
    .btn-pricing.outline:hover { border-color: var(--text-ink); }

    .btn-pricing.disabled {
      background-color: #cccccc;
      color: #666666;
      border: 1px solid #cccccc;
      cursor: not-allowed;
      opacity: 0.6;
    }

    .pricing-card .ribbon {
      position: absolute;
      top: 24px;
      right: -8px;
      background-color: #FFD35B;
      color: #0a0f1a;
      padding: 8px 16px;
      font-family: var(--font-display);
      font-size: 10px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }

    .pricing-card .ribbon::after {
      content: '';
      position: absolute;
      right: 0;
      bottom: -8px;
      width: 0;
      height: 0;
      border-left: 8px solid transparent;
      border-top: 8px solid #D4A832;
    }

    footer {
      background-color: var(--bg-white);
      border-top: 2px solid var(--border-color);
      padding: 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    footer .footer-brand {
      font-family: var(--font-display);
      font-weight: 700;
      font-size: 16px;
      letter-spacing: -0.5px;
    }

    footer .footer-copy {
      font-size: 13px;
      color: var(--text-gray);
    }

    @media (max-width: 900px) {
      .hero { grid-template-columns: 1fr; }
      .hero-visual { min-height: 400px; }
      .border-r { border-right: none; border-bottom: 1px solid var(--border-color); }
      .nav-links { display: none; }
      .feature-grid { grid-template-columns: 1fr; }
      .pricing-grid { grid-template-columns: 1fr; }
      .pricing-card:not(:last-child) { border-right: none; border-bottom: 1px solid var(--border-color); }
      .trusted-by { position: relative; bottom: 0; margin-top: 64px; }
      .glass-card { left: 20px; bottom: 20px; width: calc(100% - 40px); max-width: 280px; }
      footer { flex-direction: column; gap: 16px; text-align: center; }
    }
  </style>
</head>
<body>

  <nav class="border-b">
    <div class="brand">
      <div class="brand-icon"><div></div><div></div><div></div><div></div></div>
      dev foundation
    </div>
    <div class="nav-links">
      <a href="#fitur">Fitur</a>
      <a href="#harga">Harga</a>
    </div>
    <div class="nav-actions">
      <a href="{{ route('login') }}" class="btn-ghost">Login / Daftar</a>
    </div>
  </nav>

  <header class="hero">
    <div class="hero-content border-r">
      <div class="hero-eyebrow">▪ ▪ ▪</div>
      <h1>
        Kendali Total<br>
        <span class="serif">atas waktu &</span><br>
        Uang Anda
      </h1>
      <p class="hero-desc">
        Platform cerdas untuk memvisualisasikan matriks prioritas, mengelola anggaran, dan melacak portofolio investasi Anda secara terpusat tanpa hambatan.
      </p>
      <div class="hero-cta">
        <a href="{{ route('login') }}" class="btn-solid">Buka Web App</a>
        <a href="https://github.com/dafhhq01/productivity-app/releases/download/mobile-v1.0.0/trackapp-v1.0-debug.apk" class="btn-outline">Unduh APK (Beta)</a>
      </div>

      <div class="trusted-by">
        <p>DIBANGUN OLEH DEV FOUNDATION</p>
        <div class="logos">
          <span>LARAVEL</span>
          <span>MYSQL</span>
          <span>TAILWIND</span>
        </div>
      </div>
    </div>

    <div class="hero-visual">
      <svg class="cloud-svg" viewBox="0 0 100 100" preserveAspectRatio="none">
        <circle cx="20" cy="80" r="50" fill="#ffffff" />
        <circle cx="80" cy="20" r="60" fill="#ffffff" />
        <circle cx="50" cy="50" r="40" fill="#ffffff" />
      </svg>

      <svg class="retro-pc" viewBox="0 0 200 200" fill="none">
        <rect x="70" y="140" width="60" height="20" fill="#e0e5ec" />
        <rect x="40" y="40" width="120" height="100" rx="4" fill="#f0f4f8" stroke="#cbd5e1" stroke-width="2"/>
        <rect x="50" y="50" width="100" height="75" rx="2" fill="#1e293b" />
        <path d="M 30 170 L 170 170 L 180 190 L 20 190 Z" fill="#f0f4f8" stroke="#cbd5e1" stroke-width="2"/>
        <path d="M 50 50 L 150 50 L 50 125 Z" fill="rgba(255,255,255,0.05)" />
      </svg>

      <div class="glass-card">
        <div class="glass-icon"><span></span><span></span><span></span><span></span></div>
        <h3>FINANSIAL & PRODUKTIVITAS</h3>
        <p>Sistem terdistribusi yang menggabungkan manajemen waktu dan alokasi dana secara real-time.</p>
      </div>
    </div>
  </header>

  <div class="divider-bar">
    <div class="box"></div>
    THE PROBLEM
    <div class="box"></div>
  </div>

  <section class="features" id="fitur">
    <div class="section-header">
      <h2>Hidup bergerak lebih cepat daripada kemampuan Anda memantaunya</h2>
    </div>

    <div class="feature-grid">
      <div class="feature-card">
        <div class="feature-illus">
          <svg class="iso-svg" viewBox="0 0 100 100">
            <polyline points="20 70 50 85 80 70" />
            <polyline points="20 40 50 55 80 40" />
            <polyline points="50 85 50 55" />
            <line x1="20" y1="40" x2="20" y2="70" />
            <line x1="80" y1="40" x2="80" y2="70" />
            <circle cx="50" cy="30" r="3" fill="#1a1a1a" />
            <line x1="50" y1="33" x2="50" y2="55" />
          </svg>
        </div>
        <div class="feature-text">
          <h3>Tugas Mendesak</h3>
          <p>Matriks prioritas yang memastikan Anda selalu mengerjakan hal yang tepat tanpa kehilangan fokus pada tujuan akhir.</p>
        </div>
      </div>

      <div class="feature-card">
        <div class="feature-illus">
          <svg class="iso-svg" viewBox="0 0 100 100">
            <rect x="40" y="30" width="30" height="40" />
            <line x1="40" y1="40" x2="70" y2="40" />
            <line x1="40" y1="50" x2="70" y2="50" />
            <line x1="40" y1="60" x2="70" y2="60" />
            <path d="M 10 20 Q 25 50 40 40" />
            <path d="M 10 50 Q 25 50 40 50" />
            <path d="M 10 80 Q 25 50 40 60" />
          </svg>
        </div>
        <div class="feature-text">
          <h3>Kebocoran Anggaran</h3>
          <p>Lacak setiap pengeluaran, pisahkan berdasarkan kategori, dan cegah pengeluaran berlebih di akhir bulan.</p>
        </div>
      </div>
      
      <div class="feature-card">
        <div class="feature-illus">
          <svg class="iso-svg" viewBox="0 0 100 100">
            <rect x="20" y="40" width="20" height="20" transform="rotate(45 30 50)" />
            <rect x="60" y="40" width="20" height="20" transform="rotate(45 70 50)" />
            <line x1="44" y1="50" x2="56" y2="50" stroke-dasharray="2,2" />
          </svg>
        </div>
        <div class="feature-text">
          <h3>Titik Buta Investasi</h3>
          <p>Pantau pertumbuhan aset dan dividen Anda dalam satu dashboard tanpa harus berpindah aplikasi sekuritas.</p>
        </div>
      </div>

      <div class="feature-card">
        <div class="feature-illus">
          <svg class="iso-svg" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="30" stroke-dasharray="4,4" />
            <circle cx="50" cy="20" r="5" fill="#1a1a1a" />
            <circle cx="20" cy="50" r="5" fill="#1a1a1a" />
            <circle cx="80" cy="50" r="5" fill="#1a1a1a" />
            <line x1="50" y1="25" x2="50" y2="50" />
            <line x1="25" y1="50" x2="80" y2="50" />
          </svg>
        </div>
        <div class="feature-text">
          <h3>Sinkronisasi Penuh</h3>
          <p>Akses TrackApp langsung dari web browser desktop atau unduh aplikasi mandiri (.apk) untuk ponsel Anda.</p>
        </div>
      </div>
    </div>
  </section>

  <div class="divider-bar border-t">
    <div class="box"></div>
    PRICING
    <div class="box"></div>
  </div>

  <section class="pricing" id="harga">
    <div class="section-header">
      <h2>Pilih <span class="serif">kendali</span> Anda</h2>
    </div>

    <div class="pricing-grid">
      <div class="pricing-card">
        <div class="pricing-tier">STARTER (FASE 1 BERJALAN)</div>
        <div class="price">Gratis</div>
        <p class="price-desc">Fitur esensial TrackApp yang tersedia saat ini.</p>
        <ul class="feature-list">
          <li>Manajemen Tugas & Subtask</li>
          <li>Lacak Transaksi (Pemasukan/Pengeluaran)</li>
          <li>Budgeting Bulanan (Smart Summary)</li>
          <li>Portofolio Investasi & Kalkulasi Profit</li>
          <li>Responsive Web App</li>
        </ul>
        <a href="{{ route('register') }}" class="btn-pricing solid">Mulai Gratis</a>
      </div>

      <div class="pricing-card highlight">
        <div class="ribbon">COMING SOON</div>
        <div class="pricing-tier">PRO (EARLY BETA)</div>
        <div class="price">
          Rp 0 / bln
          <span class="price-old">Rp 49.000</span>
        </div>
        <p class="price-desc">Dapatkan akses beta gratis untuk fitur lanjutan yang sedang dikembangkan.</p>
        <ul class="feature-list">
          <li>Semua fitur Starter</li>
          <li>Habit Tracker & Journal</li>
          <li>6-Month Challenge</li>
          <li>Integrasi Harada Method</li>
          <li>Aplikasi Native Kotlin (Android)</li>
        </ul>
        <button class="btn-pricing disabled" disabled>Belum Tersedia</button>
      </div>

      <div class="pricing-card">
        <div class="pricing-tier">CUSTOM</div>
        <div class="price">Custom</div>
        <p class="price-desc">Untuk kebutuhan kustomisasi sistem atau white-label mandiri.</p>
        <ul class="feature-list">
          <li>Dedicated Hosting / White-label</li>
          <li>Fitur Spesifik Kustom</li>
          <li>Integrasi Sistem Eksternal</li>
          <li>Support Langsung Developer</li>
        </ul>
        <a href="https://wa.me/6289601038052" class="btn-pricing outline">Hubungi Developer</a>
      </div>
    </div>
  </section>

  <footer>
    <div class="footer-brand">TRACKAPP BY DEV FOUNDATION</div>
    <div class="footer-copy">&copy; 2026. All rights reserved.</div>
  </footer>

</body>
</html>
