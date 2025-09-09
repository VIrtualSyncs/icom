<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GreenVilla Residence - Hunian Elegan & Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              "green-primary": "#2D5A27",
              "green-saecondary": "#4A7C59",
              "green-light": "#8FBC8F",
              "green-accent": "#90EE90",
            },
          },
        },
      };
    </script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap");
      body {
        font-family: "Inter", sans-serif;
      }

      .hero-gradient {
        background: linear-gradient(
          135deg,
          rgba(45, 90, 39, 0.9) 0%,
          rgba(74, 124, 89, 0.8) 100%
        );
      }

      .card-hover {
        transition: all 0.3s ease;
      }

      .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(45, 90, 39, 0.15);
      }

      .fade-in {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
      }

      .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
      }

      .gallery-item {
        transition: all 0.3s ease;
        cursor: pointer;
      }

      .gallery-item:hover {
        transform: scale(1.05);
      }

      .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
      }

      .modal.show {
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .modal img {
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
      }
    </style>
  </head>
  <body class="bg-white">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full top-0 z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <h1 class="text-2xl font-bold text-green-primary">
                Pesona Prima 8 BANJARAN
              </h1>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-8">
              <a
                href="#home"
                class="text-green-primary hover:text-green-secondary px-3 py-2 text-sm font-medium transition-colors"
                >Beranda</a
              >
              <a
                href="#about"
                class="text-gray-700 hover:text-green-primary px-3 py-2 text-sm font-medium transition-colors"
                >Tentang</a
              >
              <a
                href="#gallery"
                class="text-gray-700 hover:text-green-primary px-3 py-2 text-sm font-medium transition-colors"
                >Galeri</a
              >
              <a
                href="#projects"
                class="text-gray-700 hover:text-green-primary px-3 py-2 text-sm font-medium transition-colors"
                >Proyek</a
              >
              <a
                href="#contact"
                class="text-gray-700 hover:text-green-primary px-3 py-2 text-sm font-medium transition-colors"
                >Kontak</a
              >
            </div>
          </div>
          <div class="md:hidden">
            <button
              id="mobile-menu-btn"
              class="text-green-primary hover:text-green-secondary"
            >
              <svg
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
      <!-- Mobile menu -->
      <div id="mobile-menu" class="md:hidden hidden bg-white border-t">
        <div class="px-2 pt-2 pb-3 space-y-1">
          <a href="#home" class="block px-3 py-2 text-green-primary font-medium"
            >Beranda</a
          >
          <a
            href="#about"
            class="block px-3 py-2 text-gray-700 hover:text-green-primary"
            >Tentang</a
          >
          <a
            href="#gallery"
            class="block px-3 py-2 text-gray-700 hover:text-green-primary"
            >Galeri</a
          >
          <a
            href="#projects"
            class="block px-3 py-2 text-gray-700 hover:text-green-primary"
            >Proyek</a
          >
          <a
            href="#contact"
            class="block px-3 py-2 text-gray-700 hover:text-green-primary"
            >Kontak</a
          >
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative h-screen flex items-center justify-center" <section class="py-16 bg-white" onmouseenter="
  const track = document.getElementById('carousel-track');
  const slides = document.querySelectorAll('.carousel-slide');
  const dots = document.querySelectorAll('.carousel-dot');
  let currentIndex = 0;
  const totalSlides = slides.length;

  window.updateCarousel = function() {
    const slideWidth = slides[0].clientWidth;
    track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    dots.forEach((dot, i) => {
      if (i === currentIndex) {
        dot.classList.remove('bg-gray-300','hover:bg-green-light');
        dot.classList.add('bg-green-primary');
      } else {
        dot.classList.remove('bg-green-primary');
        dot.classList.add('bg-gray-300','hover:bg-green-light');
      }
    });
  }

  window.prevSlide = function() {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateCarousel();
  }

  window.nextSlide = function() {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateCarousel();
  }

  window.goToSlide = function(index) {
    currentIndex = index;
    updateCarousel();
  }
">
>
    <div class="absolute inset-0 hero-gradient"></div>
    <div class="absolute inset-0">
        @if($heroes->isNotEmpty() && $heroes->first()->gambar)
            <img
                src="{{ asset('storage/' . $heroes->first()->gambar) }}"
                alt="{{ $heroes->first()->nama }}"
                class="w-full h-full opacity-10 object-cover"
            />
        @endif
    </div>
    <div class="relative z-10 text-center text-white px-4">
        @if($heroes->isNotEmpty())
            <h1 class="text-5xl md:text-7xl font-bold mb-6 fade-in">
                {{ $heroes->first()->nama }}
            </h1>
            <p class="text-lg mb-10 max-w-2xl mx-auto fade-in">
                {{ $heroes->first()->deskripsi_hero }}
            </p>
        @endif

        <div class="flex flex-wrap gap-3 justify-center fade-in">
            <button
                onclick="scrollToSection('projects')"
                class="bg-white text-green-primary px-5 py-2 sm:px-6 sm:py-2.5 md:px-8 md:py-3 rounded-lg font-semibold text-sm sm:text-base md:text-lg hover:bg-green-accent hover:text-green-primary transition-all duration-300 transform hover:scale-105">
                Lihat Proyek
            </button>
            <button
                onclick="scrollToSection('contact')"
                class="border-2 border-white text-white px-5 py-2 sm:px-6 sm:py-2.5 md:px-8 md:py-3 rounded-lg font-semibold text-sm sm:text-base md:text-lg hover:bg-white hover:text-green-primary transition-all duration-300">
                Hubungi Kami
            </button>
        </div>
    </div>
</section>


    <!-- Image Carousel Section -->
    <section id="gallery" class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16 fade-in">
      <h2 class="text-4xl font-bold text-green-primary mb-4"> 
        Galeri Proyek
      </h2>
      <p class="text-xl text-gray-600">
        Lihat keindahan dan kemewahan hunian Pesona Prima 8 Residence
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($facilities as $facility)
        {{-- Gallery Item --}}
        <div
          class="gallery-item rounded-xl overflow-hidden shadow-lg fade-in relative"
          onclick="openModal('modal{{ $facility->id }}')"
        >
          <img
            src="{{ asset('storage/' . $facility->gambar) }}"
            alt="{{ $facility->nama }}"
            class="w-full h-64 object-cover"
            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
          />
          <div
            class="h-64 bg-gradient-to-br from-green-light to-green-secondary flex items-center justify-center"
            style="display: none"
          >
            <div class="text-center text-white">
              <svg
                class="w-16 h-16 mx-auto mb-4"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"
                />
              </svg>
              <p class="font-semibold">{{ $facility->nama }}</p>
            </div>
          </div>
          <div
            class="absolute inset-0 bg-black bg-opacity-30 flex items-end opacity-0 hover:opacity-100 transition-opacity duration-300"
          >
            <div class="text-white p-4 w-full">
              <p class="font-semibold">{{ $facility->nama }}</p>
            </div>
          </div>
        </div>

        {{-- Modal untuk facility --}}
        <div id="modal{{ $facility->id }}" class="modal hidden fixed inset-0 bg-black bg-opacity-60 z-50 flex items-center justify-center"
             onclick="closeModal('modal{{ $facility->id }}')">
          <div class="bg-white p-8 rounded-xl max-w-2xl mx-4 relative" onclick="event.stopPropagation()">
            <h3 class="text-2xl font-bold text-green-primary mb-4">
              {{ $facility->nama }}
            </h3>
            <div
              class="h-64 bg-gradient-to-br from-green-light to-green-secondary rounded-lg flex items-center justify-center mb-4 overflow-hidden"
            >
              <img src="{{ asset('storage/' . $facility->gambar) }}"
                   alt="{{ $facility->nama }}"
                   class="w-full h-full object-cover"
                   onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"/>
              <div style="display:none" class="text-center text-white">
                <svg
                  class="w-20 h-20 mx-auto mb-4"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"
                  />
                </svg>
                <p class="font-semibold">{{ $facility->nama }}</p>
              </div>
            </div>
            <p class="text-gray-600">
              {{ $facility->deskripsi }}
            </p>
            <button class="absolute top-4 right-4 text-gray-500 hover:text-red-500" onclick="closeModal('modal{{ $facility->id }}')">
              ✕
            </button>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>



    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 fade-in">
          <h2 class="text-4xl font-bold text-green-primary mb-4">
            Mengapa Memilih Pesona Prima 8?
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Kami menghadirkan konsep hunian yang memadukan kemewahan modern
            dengan keindahan alam untuk menciptakan lingkungan hidup yang ideal.
          </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
          <div class="bg-white p-8 rounded-xl shadow-lg card-hover fade-in">
            <div
              class="w-16 h-16 bg-green-light rounded-full flex items-center justify-center mb-6 mx-auto"
            >
              <svg
                class="w-8 h-8 text-green-primary"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"
                />
              </svg>
            </div>
            <h3
              class="text-xl font-semibold text-green-primary mb-4 text-center"
            >
              Desain Premium
            </h3>
            <p class="text-gray-600 text-center">
              Arsitektur modern minimalis dengan material berkualitas tinggi dan
              finishing premium untuk kenyamanan maksimal.
            </p>
          </div>

          <div class="bg-white p-8 rounded-xl shadow-lg card-hover fade-in">
            <div
              class="w-16 h-16 bg-green-light rounded-full flex items-center justify-center mb-6 mx-auto"
            >
              <svg
                class="w-8 h-8 text-green-primary"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                  clip-rule="evenodd"
                />
              </svg>
            </div>
            <h3
              class="text-xl font-semibold text-green-primary mb-4 text-center"
            >
              Lingkungan Asri
            </h3>
            <p class="text-gray-600 text-center">
              Dikelilingi taman hijau dan area resapan air alami yang
              menciptakan udara segar dan suasana tenang setiap hari.
            </p>
          </div>

          <div class="bg-white p-8 rounded-xl shadow-lg card-hover fade-in">
            <div
              class="w-16 h-16 bg-green-light rounded-full flex items-center justify-center mb-6 mx-auto"
            >
              <svg
                class="w-8 h-8 text-green-primary"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h3
              class="text-xl font-semibold text-green-primary mb-4 text-center"
            >
              Fasilitas Lengkap
            </h3>
            <p class="text-gray-600 text-center">
              Dilengkapi dengan fasilitas modern seperti taman bermain, jogging
              track, dan area komunal untuk gaya hidup aktif.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16 fade-in">
      <h2 class="text-4xl font-bold text-green-primary mb-4">
        Galeri Proyek
      </h2>
      <p class="text-xl text-gray-600">
        Lihat keindahan dan kemewahan hunian Pesona Prima 8 Residence
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($facilities as $facility)
        <div
          class="gallery-item rounded-xl overflow-hidden shadow-lg fade-in relative"
          onclick="openModal('modal{{ $facility->id }}')"
        >
          <img
            src="{{ asset('storage/' . $facility->gambar) }}"
            alt="{{ $facility->nama }}"
            class="w-full h-64 object-cover"
            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
          />
          <div
            class="h-64 bg-gradient-to-br from-green-light to-green-secondary flex items-center justify-center"
            style="display: none"
          >
            <div class="text-center text-white">
              <svg
                class="w-16 h-16 mx-auto mb-4"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"
                />
              </svg>
              <p class="font-semibold">{{ $facility->nama }}</p>
            </div>
          </div>
          <div
            class="absolute inset-0 bg-black bg-opacity-30 flex items-end opacity-0 hover:opacity-100 transition-opacity duration-300"
          >
            <div class="text-white p-4 w-full">
              <p class="font-semibold">{{ $facility->nama }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>


    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 fade-in">
          <h2 class="text-4xl font-bold text-green-primary mb-4">
            Pilihan Tipe Rumah
          </h2>
          <p class="text-xl text-gray-600">
            Berbagai pilihan tipe rumah sesuai kebutuhan keluarga Anda
          </p>
        </div>

        <div class="max-w-2xl mx-auto">
          <!-- Single House Type -->
          <div
            class="bg-white rounded-xl shadow-lg overflow-hidden card-hover fade-in"
          >
            <div class="h-64 relative overflow-hidden">
              <img
                src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                alt="GreenVilla Premium - Villa Modern Eksklusif"
                class="w-full h-full object-cover"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
              />
              <div
                class="h-64 bg-gradient-to-br from-green-light to-green-secondary flex items-center justify-center"
                style="display: none"
              >
                <div class="text-center text-white">
                  <svg
                    class="w-24 h-24 mx-auto mb-4"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"
                    />
                  </svg>
                  <p class="text-3xl font-bold">GreenVilla Premium</p>
                </div>
              </div>
              <div
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center"
              >
                <div class="text-center text-white">
                  <p class="text-3xl font-bold">Pesona Prima 8 Premium</p>
                </div>
              </div>
            </div>
            <div class="p-8">
              <h3
                class="text-2xl font-semibold text-green-primary mb-4 text-center"
              >
                Villa Modern Eksklusif
              </h3>
              <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="text-center p-4 bg-gray-50 rounded-lg">
                  <p class="text-sm text-gray-600 mb-1">Luas Tanah</p>
                  <p class="text-xl font-bold text-green-primary">60 m²</p>
                </div>
                <div class="text-center p-4 bg-gray-50 rounded-lg">
                  <p class="text-sm text-gray-600 mb-1">Luas Bangunan</p>
                  <p class="text-xl font-bold text-green-primary">20 m²</p>
                </div>
                <div class="text-center p-4 bg-gray-50 rounded-lg">
                  <p class="text-sm text-gray-600 mb-1">Kamar Tidur</p>
                  <p class="text-xl font-bold text-green-primary">2</p>
                </div>
                <div class="text-center p-4 bg-gray-50 rounded-lg">
                  <p class="text-sm text-gray-600 mb-1">Kamar Mandi</p>
                  <p class="text-xl font-bold text-green-primary">1</p>
                </div>
              </div>

              <div class="mb-6">
                <h4 class="font-semibold text-green-primary mb-3">
                  Fasilitas Premium:
                </h4>
                <div class="grid grid-cols-2 gap-2 text-sm text-gray-600">
                  <div class="flex items-center">
                    <span
                      class="w-2 h-2 bg-green-primary rounded-full mr-2"
                    ></span>
                    Kitchen Set Premium
                  </div>
                  <div class="flex items-center">
                    <span
                      class="w-2 h-2 bg-green-primary rounded-full mr-2"
                    ></span>
                    Carport 2 Mobil
                  </div>
                  <div class="flex items-center">
                    <span
                      class="w-2 h-2 bg-green-primary rounded-full mr-2"
                    ></span>
                    Taman Depan & Belakang
                  </div>
                  <div class="flex items-center">
                    <span
                      class="w-2 h-2 bg-green-primary rounded-full mr-2"
                    ></span>
                    Water Heater
                  </div>
                  <div class="flex items-center">
                    <span
                      class="w-2 h-2 bg-green-primary rounded-full mr-2"
                    ></span>
                    Listrik 1300 Watt
                  </div>
                  <div class="flex items-center">
                    <span
                      class="w-2 h-2 bg-green-primary rounded-full mr-2"
                    ></span>
                    Security 24 Jam
                  </div>
                </div>
              </div>

              <div class="text-center mb-6">
                <p class="text-3xl font-bold text-green-primary">416 Juta</p>
                <p class="text-sm text-gray-500">Harga mulai dari</p>
                <p class="text-xs text-green-secondary mt-1">
                  *Cicilan mulai 3,5 juta/bulan
                </p>
              </div>

              <div class="flex gap-4">
                <button
                  onclick="showInterest('GreenVilla Premium')"
                  class="flex-1 bg-green-primary text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-secondary transition-colors"
                >
                  Konsultasi Gratis
                </button>
                <button
                  onclick="openWhatsApp()"
                  class="flex-1 bg-green-accent text-green-primary py-3 px-6 rounded-lg font-semibold hover:bg-green-light transition-colors"
                >
                  Chat WhatsApp
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 fade-in">
          <h2 class="text-4xl font-bold text-green-primary mb-4">
            Hubungi Kami
          </h2>
          <p class="text-xl text-gray-600">
            Siap membantu mewujudkan hunian impian Anda
          </p>
        </div>

        <div class="grid md:grid-cols-2 gap-12">
          <div class="fade-in">
            <h3 class="text-2xl font-semibold text-green-primary mb-6">
              Informasi Kontak
            </h3>
            <div class="space-y-6">
              <div class="flex items-start space-x-4">
                <div
                  class="w-12 h-12 bg-green-light rounded-full flex items-center justify-center flex-shrink-0"
                >
                  <svg
                    class="w-6 h-6 text-green-primary"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-green-primary">Alamat</h4>
                  <p class="text-gray-600">
                    Jl. Pahlawan no. A4 1 JAWA BARAT, <br />KAB BANDUNG,
                    Banjaran, Kiangroke
                  </p>
                </div>
              </div>

              <div class="flex items-start space-x-4">
                <div
                  class="w-12 h-12 bg-green-light rounded-full flex items-center justify-center flex-shrink-0"
                >
                  <svg
                    class="w-6 h-6 text-green-primary"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"
                    />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-green-primary">Telepon</h4>
                  <p class="text-gray-600">
                    +62 813 131 348771<br />+62 812 3456 7890
                  </p>
                </div>
              </div>

              <div class="flex items-start space-x-4">
                <div
                  class="w-12 h-12 bg-green-light rounded-full flex items-center justify-center flex-shrink-0"
                >
                  <svg
                    class="w-6 h-6 text-green-primary"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                    />
                    <path
                      d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                    />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-green-primary">Email</h4>
                  <p class="text-gray-600">
                    marketing@kreasiprimaland.com

                    <br />sales@kreasiprimaland.com
                  </p>
                </div>
              </div>

              <div class="flex items-start space-x-4">
                <div
                  class="w-12 h-12 bg-green-light rounded-full flex items-center justify-center flex-shrink-0"
                >
                  <svg
                    class="w-6 h-6 text-green-primary"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-green-primary">
                    Jam Operasional
                  </h4>
                  <p class="text-gray-600">
                    Senin - Jumat: 08:00 - 17:00<br />Sabtu - Minggu: 09:00 -
                    16:00
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="fade-in">
    <form action="{{ route('input_pesan') }}" method="POST" class="space-y-6">
    @csrf
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Nama Lengkap
        </label>
        <input
            type="text"
            name="name"
            required
            placeholder="Masukkan nama lengkap Anda"
            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-primary focus:border-green-primary transition-all"
        />
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Email
        </label>
        <input
            type="email"
            name="email"
            placeholder="Masukkan email aktif Anda"
            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-primary focus:border-green-primary transition-all"
        />
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Nomor Telepon
        </label>
        <input
            type="tel"
            name="phone"
            placeholder="Contoh: 081234567890"
            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-primary focus:border-green-primary transition-all"
        />
    </div>

    <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Kebutuhan Konsultasi
    </label>
    <select
        name="kebutuhan"
        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-primary focus:border-green-primary transition-all appearance-none"
        required
    >
        <option value="">Pilih Kebutuhan</option>
        <option value="Informasi GreenVilla Premium">Informasi GreenVilla Premium</option>
        <option value="Kunjungan Lokasi">Kunjungan Lokasi</option>
        <option value="Konsultasi KPR">Konsultasi KPR</option>
        <option value="Lainnya">Lainnya</option>
    </select>
</div>


    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Pesan
        </label>
        <textarea
            name="pesan"
            rows="4"
            required
            placeholder="Tuliskan pertanyaan atau pesan Anda..."
            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-primary focus:border-green-primary transition-all"
        ></textarea>
    </div>

    <button
        type="submit"
        class="w-full bg-green-primary text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-secondary transition-all duration-300 transform hover:scale-105"
    >
        Kirim Pesan
    </button>
</form>

          </div>
        </div>
      </div>
    </section>

    <!-- Promotional Popup -->
    <div
      id="promo-popup"
      class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 invisible transition-all duration-500"
    >
      <div
        class="bg-white rounded-2xl w-[90%] max-w-sm mx-4 overflow-hidden shadow-2xl transform scale-95 transition-all duration-500 relative"
        id="promo-content"
      >
        <!-- Close Button -->
        <button
          onclick="closePromoPopup()"
          class="absolute top-4 right-4 z-20 bg-white bg-opacity-90 hover:bg-opacity-100 text-gray-600 hover:text-gray-800 w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300 shadow-lg"
        >
          <svg
            class="w-5 h-5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </button>

        <!-- Promo Header -->
        <div
          class="bg-gradient-to-r from-green-primary to-green-secondary text-white p-4 text-center relative"
        >
          <div class="absolute top-0 left-0 w-full h-full opacity-10">
            <svg viewBox="0 0 400 200" class="w-full h-full">
              <circle cx="50" cy="50" r="30" fill="white" />
              <circle cx="350" cy="150" r="25" fill="white" />
              <circle cx="300" cy="30" r="20" fill="white" />
            </svg>
          </div>
          <div class="relative z-10">
            <h2 class="text-xl font-bold mb-1">🎉 PROMO SPESIAL!</h2>
            <p class="text-green-accent text-sm">
              Grand Opening Pesona Prima 8
            </p>
          </div>
        </div>

        <!-- Promo Content -->
        <div class="p-4">
          <div class="text-center mb-4">
            <div
              class="bg-red-500 text-white px-3 py-1 rounded-full inline-block mb-2 animate-pulse"
            >
              <span class="font-bold text-sm">DISKON 15%</span>
            </div>
            <h3 class="text-lg font-bold text-green-primary mb-1">
              Khusus 20 Pembeli Pertama!
            </h3>
            <p class="text-gray-600 text-xs mb-2">
              Dapatkan kesempatan emas memiliki hunian impian dengan harga
              terbaik
            </p>
          </div>

          <!-- Promo Benefits -->
          <div class="space-y-2 mb-4">
            <div class="flex items-center text-xs">
              <div
                class="w-4 h-4 bg-green-primary rounded-full flex items-center justify-center mr-2 flex-shrink-0"
              >
                <svg
                  class="w-2 h-2 text-white"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <span class="text-gray-700">Diskon 15% dari harga normal</span>
            </div>
            <div class="flex items-center text-xs">
              <div
                class="w-4 h-4 bg-green-primary rounded-full flex items-center justify-center mr-2 flex-shrink-0"
              >
                <svg
                  class="w-2 h-2 text-white"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <span class="text-gray-700">GRATIS biaya notaris & BPHTB</span>
            </div>
            <div class="flex items-center text-xs">
              <div
                class="w-4 h-4 bg-green-primary rounded-full flex items-center justify-center mr-2 flex-shrink-0"
              >
                <svg
                  class="w-2 h-2 text-white"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <span class="text-gray-700">Cicilan 0% selama 12 bulan</span>
            </div>
            <div class="flex items-center text-xs">
              <div
                class="w-4 h-4 bg-green-primary rounded-full flex items-center justify-center mr-2 flex-shrink-0"
              >
                <svg
                  class="w-2 h-2 text-white"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <span class="text-gray-700"
                >Konsultasi GRATIS dengan arsitek</span
              >
            </div>
          </div>

          <!-- Countdown Timer -->
          <div class="bg-gray-50 rounded-lg p-3 mb-4 text-center">
            <p class="text-xs text-gray-600 mb-2">Promo berakhir dalam:</p>
            <div class="flex justify-center space-x-2" id="countdown-timer">
              <div class="text-center">
                <div
                  class="bg-green-primary text-white rounded px-2 py-1 min-w-[35px]"
                >
                  <span class="text-sm font-bold" id="days">07</span>
                </div>
                <p class="text-xs text-gray-500 mt-1">Hari</p>
              </div>
              <div class="text-center">
                <div
                  class="bg-green-primary text-white rounded px-2 py-1 min-w-[35px]"
                >
                  <span class="text-sm font-bold" id="hours">23</span>
                </div>
                <p class="text-xs text-gray-500 mt-1">Jam</p>
              </div>
              <div class="text-center">
                <div
                  class="bg-green-primary text-white rounded px-2 py-1 min-w-[35px]"
                >
                  <span class="text-sm font-bold" id="minutes">45</span>
                </div>
                <p class="text-xs text-gray-500 mt-1">Menit</p>
              </div>
              <div class="text-center">
                <div
                  class="bg-green-primary text-white rounded px-2 py-1 min-w-[35px]"
                >
                  <span class="text-sm font-bold" id="seconds">30</span>
                </div>
                <p class="text-xs text-gray-500 mt-1">Detik</p>
              </div>
            </div>
          </div>

          <!-- CTA Buttons -->
          <div class="space-y-2">
            <button
              onclick="claimPromo()"
              class="w-full bg-gradient-to-r from-green-primary to-green-secondary text-white py-2 px-4 rounded-lg font-bold text-sm hover:from-green-secondary hover:to-green-primary transition-all duration-300 transform hover:scale-105 shadow-lg"
            >
              🎯 KLAIM PROMO SEKARANG!
            </button>
            <button
              onclick="openWhatsApp()"
              class="w-full border-2 border-green-primary text-green-primary py-2 px-4 rounded-lg font-semibold text-sm hover:bg-green-primary hover:text-white transition-all duration-300"
            >
              💬 Chat WhatsApp
            </button>
          </div>

          <p class="text-xs text-gray-500 text-center mt-3">
            *Syarat dan ketentuan berlaku
          </p>
        </div>
      </div>
    </div>

    <!-- Floating WhatsApp Button -->
    <div id="whatsapp-float" class="fixed bottom-6 right-6 z-50">
      <button
        onclick="openWhatsApp()"
        class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110 animate-pulse"
      >
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"
          />
        </svg>
      </button>

      <!-- WhatsApp Tooltip -->
      <div
        class="absolute bottom-full right-0 mb-2 px-3 py-2 bg-gray-800 text-white text-sm rounded-lg opacity-0 invisible transition-all duration-300 whitespace-nowrap"
        id="whatsapp-tooltip"
      >
        Chat dengan kami di WhatsApp
        <div
          class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800"
        ></div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="bg-green-primary text-white py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8">
          <div>
            <h3 class="text-2xl font-bold mb-4">Pesona Prima 8 BANJARAN</h3>
            <p class="text-green-accent mb-4">
              Hunian elegan di tengah kehijauan alami untuk keluarga modern.
            </p>
            <div class="flex space-x-4">
              <div
                class="w-8 h-8 bg-green-secondary rounded-full flex items-center justify-center cursor-pointer hover:bg-green-light transition-colors"
              >
                <span class="text-sm">f</span>
              </div>
              <div
                class="w-8 h-8 bg-green-secondary rounded-full flex items-center justify-center cursor-pointer hover:bg-green-light transition-colors"
              >
                <span class="text-sm">ig</span>
              </div>
              <div
                class="w-8 h-8 bg-green-secondary rounded-full flex items-center justify-center cursor-pointer hover:bg-green-light transition-colors"
              >
                <span class="text-sm">wa</span>
              </div>
            </div>
          </div>

          <div>
            <h4 class="font-semibold mb-4">Navigasi</h4>
            <ul class="space-y-2">
              <li>
                <a
                  href="#home"
                  class="text-green-accent hover:text-white transition-colors"
                  >Beranda</a
                >
              </li>
              <li>
                <a
                  href="#about"
                  class="text-green-accent hover:text-white transition-colors"
                  >Tentang</a
                >
              </li>
              <li>
                <a
                  href="#gallery"
                  class="text-green-accent hover:text-white transition-colors"
                  >Galeri</a
                >
              </li>
              <li>
                <a
                  href="#projects"
                  class="text-green-accent hover:text-white transition-colors"
                  >Proyek</a
                >
              </li>
            </ul>
          </div>

          <div>
            <h4 class="font-semibold mb-4">Produk Kami</h4>
            <ul class="space-y-2">
              <li>
                <span class="text-green-accent">Pesona Prima 8 Premium</span>
              </li>
              <li>
                <span class="text-green-accent">Villa Modern Eksklusif</span>
              </li>
              <li>
                <span class="text-green-accent">Hunian Ramah Lingkungan</span>
              </li>
            </ul>
          </div>

          <div>
            <h4 class="font-semibold mb-4">Kontak</h4>
            <ul class="space-y-2 text-green-accent">
              <li>Jl. Pahlawan no. A4 1 Banjaran, KAB BANDUNG</li>
              <li>+62 813 1313 4877</li>
              <li>marketing@kreasiprimaland.com</li>
            </ul>
          </div>
        </div>

        <div class="border-t border-green-secondary mt-8 pt-8 text-center">
          <p class="text-green-accent">
            &copy; 2024 PT. KREASI PRIMA NUSANTARA. Semua hak dilindungi.
          </p>
        </div>
      </div>
    </footer>

    <!-- Modals for Gallery -->
    <div id="modal1" class="modal" onclick="closeModal('modal1')">
      <div class="bg-white p-8 rounded-xl max-w-2xl mx-4">
        <h3 class="text-2xl font-bold text-green-primary mb-4">
          Tampak Depan Rumah
        </h3>
        <div
          class="h-64 bg-gradient-to-br from-green-light to-green-secondary rounded-lg flex items-center justify-center mb-4"
        >
          <div class="text-center text-white">
            <svg
              class="w-20 h-20 mx-auto mb-4"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"
              />
            </svg>
            <p class="font-semibold">Desain Fasad Modern</p>
          </div>
        </div>
        <p class="text-gray-600">
          Tampak depan rumah dengan desain modern minimalis yang elegan,
          dilengkapi dengan taman depan yang asri dan carport yang luas.
        </p>
      </div>
    </div>

    <div id="modal2" class="modal" onclick="closeModal('modal2')">
      <div class="bg-white p-8 rounded-xl max-w-2xl mx-4">
        <h3 class="text-2xl font-bold text-green-primary mb-4">
          Interior Living Room
        </h3>
        <div
          class="h-64 bg-gradient-to-br from-green-secondary to-green-primary rounded-lg flex items-center justify-center mb-4"
        >
          <div class="text-center text-white">
            <svg
              class="w-20 h-20 mx-auto mb-4"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"
              />
            </svg>
            <p class="font-semibold">Ruang Keluarga Premium</p>
          </div>
        </div>
        <p class="text-gray-600">
          Ruang keluarga yang luas dan nyaman dengan pencahayaan alami yang
          optimal, dilengkapi dengan furniture berkualitas tinggi.
        </p>
      </div>
    </div>

    <div id="modal3" class="modal" onclick="closeModal('modal3')">
      <div class="bg-white p-8 rounded-xl max-w-2xl mx-4">
        <h3 class="text-2xl font-bold text-green-primary mb-4">
          Master Bedroom
        </h3>
        <div
          class="h-64 bg-gradient-to-br from-green-primary to-green-light rounded-lg flex items-center justify-center mb-4"
        >
          <div class="text-center text-white">
            <svg
              class="w-20 h-20 mx-auto mb-4"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
              />
            </svg>
            <p class="font-semibold">Kamar Tidur Utama</p>
          </div>
        </div>
        <p class="text-gray-600">
          Kamar tidur utama yang luas dengan walk-in closet dan kamar mandi
          en-suite, memberikan privasi dan kenyamanan maksimal.
        </p>
      </div>
    </div>

    <div id="modal4" class="modal" onclick="closeModal('modal4')">
      <div class="bg-white p-8 rounded-xl max-w-2xl mx-4">
        <h3 class="text-2xl font-bold text-green-primary mb-4">
          Kitchen & Dining
        </h3>
        <div
          class="h-64 bg-gradient-to-br from-green-light to-green-secondary rounded-lg flex items-center justify-center mb-4"
        >
          <div class="text-center text-white">
            <svg
              class="w-20 h-20 mx-auto mb-4"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"
              />
            </svg>
            <p class="font-semibold">Dapur Modern</p>
          </div>
        </div>
        <p class="text-gray-600">
          Dapur modern dengan kitchen set premium dan ruang makan yang
          terintegrasi, cocok untuk aktivitas memasak dan berkumpul keluarga.
        </p>
      </div>
    </div>

    <div id="modal5" class="modal" onclick="closeModal('modal5')">
      <div class="bg-white p-8 rounded-xl max-w-2xl mx-4">
        <h3 class="text-2xl font-bold text-green-primary mb-4">
          Taman & Landscape
        </h3>
        <div
          class="h-64 bg-gradient-to-br from-green-secondary to-green-primary rounded-lg flex items-center justify-center mb-4"
        >
          <div class="text-center text-white">
            <svg
              class="w-20 h-20 mx-auto mb-4"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                fill-rule="evenodd"
                d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.559-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.559.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z"
                clip-rule="evenodd"
              />
            </svg>
            <p class="font-semibold">Landscape Hijau</p>
          </div>
        </div>
        <p class="text-gray-600">
          Taman belakang yang asri dengan landscape design profesional,
          menciptakan suasana alami dan udara segar di sekitar rumah.
        </p>
      </div>
    </div>

    <div id="modal6" class="modal" onclick="closeModal('modal6')">
      <div class="bg-white p-8 rounded-xl max-w-2xl mx-4">
        <h3 class="text-2xl font-bold text-green-primary mb-4">
          Fasilitas Umum
        </h3>
        <div
          class="h-64 bg-gradient-to-br from-green-primary to-green-light rounded-lg flex items-center justify-center mb-4"
        >
          <div class="text-center text-white">
            <svg
              class="w-20 h-20 mx-auto mb-4"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"
              />
            </svg>
            <p class="font-semibold">Fasilitas Lengkap</p>
          </div>
        </div>
        <p class="text-gray-600">
          Fasilitas umum lengkap termasuk taman bermain anak, jogging track,
          gazebo, dan area parkir yang luas untuk kenyamanan penghuni.
        </p>
      </div>
    </div>

    <script>
      // Mobile menu toggle
      document
        .getElementById("mobile-menu-btn")
        .addEventListener("click", function () {
          const mobileMenu = document.getElementById("mobile-menu");
          mobileMenu.classList.toggle("hidden");
        });

      // Smooth scrolling for navigation links
      function scrollToSection(sectionId) {
        document.getElementById(sectionId).scrollIntoView({
          behavior: "smooth",
        });
      }

      // Add smooth scrolling to all navigation links
      document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute("href"));
          if (target) {
            target.scrollIntoView({
              behavior: "smooth",
              block: "start",
            });
          }
          // Close mobile menu if open
          document.getElementById("mobile-menu").classList.add("hidden");
        });
      });

      // Fade in animation on scroll
      function fadeInOnScroll() {
        const elements = document.querySelectorAll(".fade-in");
        elements.forEach((element) => {
          const elementTop = element.getBoundingClientRect().top;
          const elementVisible = 150;

          if (elementTop < window.innerHeight - elementVisible) {
            element.classList.add("visible");
          }
        });
      }

      window.addEventListener("scroll", fadeInOnScroll);
      window.addEventListener("load", fadeInOnScroll);

      // Gallery modal functions
      function openModal(modalId) {
        document.getElementById(modalId).classList.add("show");
        document.body.style.overflow = "hidden";
      }

      function closeModal(modalId) {
        document.getElementById(modalId).classList.remove("show");
        document.body.style.overflow = "auto";
      }

      // Close modal when clicking outside
      document.querySelectorAll(".modal").forEach((modal) => {
        modal.addEventListener("click", function (e) {
          if (e.target === this) {
            this.classList.remove("show");
            document.body.style.overflow = "auto";
          }
        });
      });

      // Show interest function
      function showInterest(houseType) {
        document.getElementById("house-type").value = houseType;
        scrollToSection("contact");

        // Add a subtle highlight to the form
        const form = document.getElementById("contact-form");
        form.style.boxShadow = "0 0 20px rgba(45, 90, 39, 0.3)";
        setTimeout(() => {
          form.style.boxShadow = "none";
        }, 3000);
      }

      // WhatsApp function
      function openWhatsApp() {
        const phoneNumber = "6281234567890"; // Ganti dengan nomor WhatsApp yang sebenarnya
        const message = encodeURIComponent(
          "Halo! Saya tertarik dengan GreenVilla Premium. Bisa minta informasi lebih lanjut?"
        );
        const whatsappURL = `https://wa.me/${phoneNumber}?text=${message}`;
        window.open(whatsappURL, "_blank");
      }

      // WhatsApp tooltip functionality
      const whatsappButton = document.querySelector("#whatsapp-float button");
      const whatsappTooltip = document.getElementById("whatsapp-tooltip");

      whatsappButton.addEventListener("mouseenter", () => {
        whatsappTooltip.classList.remove("opacity-0", "invisible");
        whatsappTooltip.classList.add("opacity-100", "visible");
      });

      whatsappButton.addEventListener("mouseleave", () => {
        whatsappTooltip.classList.remove("opacity-100", "visible");
        whatsappTooltip.classList.add("opacity-0", "invisible");
      });

      // Contact form submission
      document
        .getElementById("contact-form")
        .addEventListener("submit", function (e) {
          e.preventDefault();

          const name = document.getElementById("name").value;
          const email = document.getElementById("email").value;
          const phone = document.getElementById("phone").value;
          const houseType = document.getElementById("house-type").value;
          const message = document.getElementById("message").value;

          // Simple validation
          if (!name || !email || !phone) {
            alert("Mohon lengkapi semua field yang wajib diisi.");
            return;
          }

          // Simulate form submission
          const submitBtn = e.target.querySelector('button[type="submit"]');
          const originalText = submitBtn.textContent;
          submitBtn.textContent = "Mengirim...";
          submitBtn.disabled = true;

          setTimeout(() => {
            alert(
              `Terima kasih ${name}! Pesan Anda telah diterima. Tim kami akan segera menghubungi Anda di ${phone}.`
            );
            this.reset();
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
          }, 2000);
        });

      // Carousel functionality
      let currentSlide = 0;
      const totalSlides = 5;
      const carouselTrack = document.getElementById("carousel-track");
      const dots = document.querySelectorAll(".carousel-dot");

      function updateCarousel() {
        const translateX = -currentSlide * 100;
        carouselTrack.style.transform = `translateX(${translateX}%)`;

        // Update dots
        dots.forEach((dot, index) => {
          if (index === currentSlide) {
            dot.classList.remove("bg-gray-300");
            dot.classList.add("bg-green-primary");
          } else {
            dot.classList.remove("bg-green-primary");
            dot.classList.add("bg-gray-300");
          }
        });
      }

      function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
      }

      function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
      }

      function goToSlide(slideIndex) {
        currentSlide = slideIndex;
        updateCarousel();
      }

      // Auto-play carousel
      let carouselInterval = setInterval(nextSlide, 5000);

      // Pause auto-play on hover
      const carouselContainer = document.querySelector(".carousel-container");
      carouselContainer.addEventListener("mouseenter", () => {
        clearInterval(carouselInterval);
      });

      carouselContainer.addEventListener("mouseleave", () => {
        carouselInterval = setInterval(nextSlide, 5000);
      });

      // Touch/swipe support for mobile
      let startX = 0;
      let endX = 0;

      carouselContainer.addEventListener("touchstart", (e) => {
        startX = e.touches[0].clientX;
      });

      carouselContainer.addEventListener("touchend", (e) => {
        endX = e.changedTouches[0].clientX;
        handleSwipe();
      });

      function handleSwipe() {
        const swipeThreshold = 50;
        const diff = startX - endX;

        if (Math.abs(diff) > swipeThreshold) {
          if (diff > 0) {
            nextSlide();
          } else {
            prevSlide();
          }
        }
      }

      // Add active navigation highlighting
      window.addEventListener("scroll", function () {
        const sections = ["home", "about", "gallery", "projects", "contact"];
        const navLinks = document.querySelectorAll('nav a[href^="#"]');

        let current = "";
        sections.forEach((section) => {
          const element = document.getElementById(section);
          if (element) {
            const rect = element.getBoundingClientRect();
            if (rect.top <= 100 && rect.bottom >= 100) {
              current = section;
            }
          }
        });

        navLinks.forEach((link) => {
          link.classList.remove("text-green-primary");
          link.classList.add("text-gray-700");
          if (link.getAttribute("href") === `#${current}`) {
            link.classList.remove("text-gray-700");
            link.classList.add("text-green-primary");
          }
        });
      });

      // Promotional Popup Functions
      function showPromoPopup() {
        const popup = document.getElementById("promo-popup");
        const content = document.getElementById("promo-content");

        popup.classList.remove("opacity-0", "invisible");
        popup.classList.add("opacity-100", "visible");

        setTimeout(() => {
          content.classList.remove("scale-95");
          content.classList.add("scale-100");
        }, 100);

        document.body.style.overflow = "hidden";
      }

      function closePromoPopup() {
        const popup = document.getElementById("promo-popup");
        const content = document.getElementById("promo-content");

        content.classList.remove("scale-100");
        content.classList.add("scale-95");

        setTimeout(() => {
          popup.classList.remove("opacity-100", "visible");
          popup.classList.add("opacity-0", "invisible");
          document.body.style.overflow = "auto";
        }, 300);

        // Set cookie to not show popup again for 24 hours
        const expires = new Date();
        expires.setTime(expires.getTime() + 24 * 60 * 60 * 1000); // 24 hours
        document.cookie = `promoSeen=true; expires=${expires.toUTCString()}; path=/`;
      }

      function claimPromo() {
        // Close popup and scroll to contact form
        closePromoPopup();
        setTimeout(() => {
          scrollToSection("contact");
          // Pre-fill the form with promo interest
          document.getElementById("house-type").value = "GreenVilla Premium";
          document.getElementById("message").value =
            "Saya tertarik dengan promo spesial Grand Opening GreenVilla. Mohon informasi lebih lanjut mengenai diskon 15% dan penawaran khusus lainnya.";

          // Highlight the form
          const form = document.getElementById("contact-form");
          form.style.boxShadow = "0 0 20px rgba(45, 90, 39, 0.3)";
          setTimeout(() => {
            form.style.boxShadow = "none";
          }, 3000);
        }, 500);
      }

      // Check if popup should be shown
      function checkPromoPopup() {
        // Check if user has seen popup in last 24 hours
        const cookies = document.cookie.split(";");
        let promoSeen = false;

        cookies.forEach((cookie) => {
          const [name, value] = cookie.trim().split("=");
          if (name === "promoSeen" && value === "true") {
            promoSeen = true;
          }
        });

        // Show popup after 3 seconds if not seen recently
        if (!promoSeen) {
          setTimeout(showPromoPopup, 3000);
        }
      }

      // Countdown Timer Function
      function startCountdown() {
        // Set target date (7 days from now)
        const targetDate = new Date();
        targetDate.setDate(targetDate.getDate() + 7);
        targetDate.setHours(23, 59, 59, 999);

        function updateCountdown() {
          const now = new Date().getTime();
          const distance = targetDate.getTime() - now;

          if (distance > 0) {
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor(
              (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
            );
            const minutes = Math.floor(
              (distance % (1000 * 60 * 60)) / (1000 * 60)
            );
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").textContent = days
              .toString()
              .padStart(2, "0");
            document.getElementById("hours").textContent = hours
              .toString()
              .padStart(2, "0");
            document.getElementById("minutes").textContent = minutes
              .toString()
              .padStart(2, "0");
            document.getElementById("seconds").textContent = seconds
              .toString()
              .padStart(2, "0");
          } else {
            // Countdown finished
            document.getElementById("days").textContent = "00";
            document.getElementById("hours").textContent = "00";
            document.getElementById("minutes").textContent = "00";
            document.getElementById("seconds").textContent = "00";
          }
        }

        // Update countdown every second
        updateCountdown();
        setInterval(updateCountdown, 1000);
      }

      // Initialize popup and countdown when page loads
      window.addEventListener("load", function () {
        checkPromoPopup();
        startCountdown();
      });

      // Close popup when clicking outside
      document
        .getElementById("promo-popup")
        .addEventListener("click", function (e) {
          if (e.target === this) {
            closePromoPopup();
          }
        });
    </script>
    <script>
      (function () {
        function c() {
          var b = a.contentDocument || a.contentWindow.document;
          if (b) {
            var d = b.createElement("script");
            d.innerHTML =
              "window.__CF$cv$params={r:'9789ddc9717a5f3a',t:'MTc1Njc4MzE3Mi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
            b.getElementsByTagName("head")[0].appendChild(d);
          }
        }
        if (document.body) {
          var a = document.createElement("iframe");
          a.height = 1;
          a.width = 1;
          a.style.position = "absolute";
          a.style.top = 0;
          a.style.left = 0;
          a.style.border = "none";
          a.style.visibility = "hidden";
          document.body.appendChild(a);
          if ("loading" !== document.readyState) c();
          else if (window.addEventListener)
            document.addEventListener("DOMContentLoaded", c);
          else {
            var e = document.onreadystatechange || function () {};
            document.onreadystatechange = function (b) {
              e(b);
              "loading" !== document.readyState &&
                ((document.onreadystatechange = e), c());
            };
          }
        }
      })();
    </script>
  </body>
</html>
