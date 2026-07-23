<!-- ========== TÉMOIGNAGES AVEC SLIDER ========== -->
<section id="temoignages" class="temoignages">
  <div class="container">
    <div class="section-head center reveal">
      <div class="tag">Ce qu'ils en disent</div>
      <h2>Témoignages de <span class="u-accent">nos membres</span></h2>
      <p>Des milliers de Togolais font confiance à l'ATC. Voici leurs expériences.</p>
    </div>

    <div class="temo-slider-wrapper">
      <div class="temo-slider" id="temoSlider">
        <!-- Slide 1 -->
        <div class="temo-slide">
          <div class="temo-card">
            <div class="temo-stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <p class="temo-text">"Grâce à l'ATC, j'ai pu récupérer mon argent après l'achat d'un téléphone défectueux. Le suivi juridique était professionnel et rapide. Je recommande vivement."</p>
            <div class="temo-author">
              <div class="temo-avatar">AK</div>
              <div class="temo-author-info">
                <strong>Akossiwa Kodzo</strong>
                <small>Commerçante, Lomé</small>
              </div>
            </div>
            <div class="quote-bg">"</div>
          </div>
        </div>
        <!-- Slide 2 -->
        <div class="temo-slide">
          <div class="temo-card">
            <div class="temo-stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <p class="temo-text">"L'atelier de formation que j'ai suivi sur la lecture des étiquettes a totalement changé ma façon de consommer. Je suis maintenant plus vigilante au quotidien."</p>
            <div class="temo-author">
              <div class="temo-avatar red">MB</div>
              <div class="temo-author-info">
                <strong>Mawuli Boni</strong>
                <small>Enseignant, Kara</small>
              </div>
            </div>
            <div class="quote-bg">"</div>
          </div>
        </div>
        <!-- Slide 3 -->
        <div class="temo-slide">
          <div class="temo-card">
            <div class="temo-stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
            </div>
            <p class="temo-text">"La ligne verte 8280 a été d'une aide précieuse lorsque j'ai découvert des produits périmés dans ma boutique de quartier. L'ATC a agi en 48 heures."</p>
            <div class="temo-author">
              <div class="temo-avatar gold">ES</div>
              <div class="temo-author-info">
                <strong>Efoé Soglo</strong>
                <small>Pharmacien, Atakpamé</small>
              </div>
            </div>
            <div class="quote-bg">"</div>
          </div>
        </div>
        <!-- Slide 4 (ajouté pour démo) -->
        <div class="temo-slide">
          <div class="temo-card">
            <div class="temo-stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <p class="temo-text">"Un grand merci à l'équipe pour leur écoute et leur professionnalisme. Ils m'ont aidé à résoudre un conflit avec un fournisseur d'électricité."</p>
            <div class="temo-author">
              <div class="temo-avatar">DK</div>
              <div class="temo-author-info">
                <strong>Dodzi Komlan</strong>
                <small>Ingénieur, Lomé</small>
              </div>
            </div>
            <div class="quote-bg">"</div>
          </div>
        </div>
      </div>

      <!-- Flèches de navigation -->
      <button class="temo-prev" id="temoPrev" aria-label="Précédent"><i class="fas fa-chevron-left"></i></button>
      <button class="temo-next" id="temoNext" aria-label="Suivant"><i class="fas fa-chevron-right"></i></button>

      <!-- Dots (indicateurs) -->
      <div class="temo-dots" id="temoDots"></div>
    </div>
  </div>
</section>

<style>
/* Styles du slider de témoignages */
.temoignages {
  overflow: hidden;
  position: relative;
}
.temo-slider-wrapper {
  position: relative;
  margin-top: 60px;
  padding: 0 40px;
}
.temo-slider {
  display: flex;
  gap: 32px;
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  scroll-behavior: smooth;
  padding: 20px 0 40px;
  cursor: grab;
  scrollbar-width: thin;
  scrollbar-color: var(--red) var(--gray-light);
}
.temo-slider:active {
  cursor: grabbing;
}
.temo-slider::-webkit-scrollbar {
  height: 6px;
}
.temo-slider::-webkit-scrollbar-track {
  background: var(--gray-light);
  border-radius: 10px;
}
.temo-slider::-webkit-scrollbar-thumb {
  background: var(--red);
  border-radius: 10px;
}
.temo-slide {
  flex: 0 0 380px;
  scroll-snap-align: start;
  transition: transform 0.3s ease;
}
@media (max-width: 768px) {
  .temo-slide {
    flex: 0 0 85%;
  }
  .temo-slider-wrapper {
    padding: 0 20px;
  }
}
@media (max-width: 480px) {
  .temo-slide {
    flex: 0 0 95%;
  }
}
.temo-card {
  background: var(--white);
  border-radius: 32px;
  padding: 36px 30px;
  border: 1px solid var(--gray-mid);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  position: relative;
  height: 100%;
  box-shadow: 0 12px 24px rgba(26, 43, 95, 0.05);
}
.temo-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 24px 48px rgba(26, 43, 95, 0.12);
  border-color: transparent;
}
.temo-stars {
  color: var(--gold);
  font-size: 0.9rem;
  margin-bottom: 20px;
  letter-spacing: 2px;
}
.temo-text {
  font-family: 'Playfair Display', serif;
  font-style: italic;
  font-size: 1.05rem;
  line-height: 1.8;
  color: var(--text);
  margin-bottom: 28px;
}
.temo-author {
  display: flex;
  align-items: center;
  gap: 14px;
}
.temo-avatar {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-weight: 700;
  font-size: 1rem;
  flex-shrink: 0;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
.temo-avatar.red {
  background: linear-gradient(135deg, var(--red) 0%, var(--red-dark) 100%);
}
.temo-avatar.gold {
  background: linear-gradient(135deg, #c49a1a 0%, var(--gold) 100%);
}
.temo-author-info strong {
  display: block;
  font-weight: 800;
  font-size: 1rem;
  color: var(--navy);
}
.temo-author-info small {
  font-size: 0.75rem;
  color: var(--gray-dark);
  text-transform: uppercase;
  letter-spacing: 0.5px;
}
.quote-bg {
  position: absolute;
  bottom: 20px;
  right: 24px;
  font-family: 'Playfair Display', serif;
  font-size: 5rem;
  color: var(--navy);
  opacity: 0.04;
  line-height: 1;
  user-select: none;
  pointer-events: none;
}
/* Flèches */
.temo-prev, .temo-next {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 44px;
  height: 44px;
  background: var(--white);
  border: 1px solid var(--gray-mid);
  border-radius: 50%;
  cursor: pointer;
  color: var(--navy);
  font-size: 1.1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
  z-index: 10;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}
.temo-prev:hover, .temo-next:hover {
  background: var(--red);
  color: #fff;
  border-color: var(--red);
  transform: translateY(-50%) scale(1.05);
}
.temo-prev {
  left: -12px;
}
.temo-next {
  right: -12px;
}
@media (max-width: 768px) {
  .temo-prev, .temo-next {
    width: 36px;
    height: 36px;
    font-size: 0.9rem;
  }
  .temo-prev { left: -8px; }
  .temo-next { right: -8px; }
}
/* Dots */
.temo-dots {
  display: flex;
  justify-content: center;
  gap: 12px;
  margin-top: 32px;
}
.temo-dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: var(--gray-mid);
  cursor: pointer;
  transition: all 0.3s ease;
  border: none;
}
.temo-dot.active {
  background: var(--red);
  width: 28px;
  border-radius: 10px;
}
.temo-dot:hover {
  background: var(--red-light);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const slider = document.getElementById('temoSlider');
  const slides = document.querySelectorAll('.temo-slide');
  const prevBtn = document.getElementById('temoPrev');
  const nextBtn = document.getElementById('temoNext');
  const dotsContainer = document.getElementById('temoDots');
  let currentIndex = 0;
  let autoplayInterval;
  const autoplayDelay = 6000;

  function createDots() {
    dotsContainer.innerHTML = '';
    slides.forEach((_, i) => {
      const dot = document.createElement('button');
      dot.classList.add('temo-dot');
      if (i === currentIndex) dot.classList.add('active');
      dot.addEventListener('click', () => {
        goToSlide(i);
        resetAutoplay();
      });
      dotsContainer.appendChild(dot);
    });
  }

  function goToSlide(index) {
    if (index < 0) index = 0;
    if (index >= slides.length) index = slides.length - 1;
    currentIndex = index;
    const slideWidth = slides[0].offsetWidth;
    const gap = 32;
    const scrollPosition = currentIndex * (slideWidth + gap);
    slider.scrollTo({ left: scrollPosition, behavior: 'smooth' });
    updateDots();
  }

  function updateDots() {
    const dots = document.querySelectorAll('.temo-dot');
    dots.forEach((dot, i) => {
      if (i === currentIndex) dot.classList.add('active');
      else dot.classList.remove('active');
    });
  }

  function nextSlide() {
    if (currentIndex < slides.length - 1) goToSlide(currentIndex + 1);
    else goToSlide(0);
  }

  function prevSlide() {
    if (currentIndex > 0) goToSlide(currentIndex - 1);
    else goToSlide(slides.length - 1);
  }

  function startAutoplay() {
    autoplayInterval = setInterval(() => nextSlide(), autoplayDelay);
  }

  function resetAutoplay() {
    clearInterval(autoplayInterval);
    startAutoplay();
  }

  prevBtn.addEventListener('click', () => { prevSlide(); resetAutoplay(); });
  nextBtn.addEventListener('click', () => { nextSlide(); resetAutoplay(); });

  slider.addEventListener('scroll', () => {
    const slideWidth = slides[0].offsetWidth;
    const gap = 32;
    const scrollLeft = slider.scrollLeft;
    const newIndex = Math.round(scrollLeft / (slideWidth + gap));
    if (newIndex !== currentIndex && newIndex >= 0 && newIndex < slides.length) {
      currentIndex = newIndex;
      updateDots();
      resetAutoplay();
    }
  });

  createDots();
  startAutoplay();

  slider.addEventListener('mouseenter', () => clearInterval(autoplayInterval));
  slider.addEventListener('mouseleave', startAutoplay);
});
</script>