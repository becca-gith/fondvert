<!-- ========== FOOTER COMPLET – HARMONISÉ AVEC LE HEADER ========== -->
<footer>
  <div class="container">
    <!-- Grille principale du footer (3 colonnes) -->
    <div class="footer-grid">
      <div class="footer-col about">
       
        <h4>À propos de l'ATC</h4>
        <p>L'Association Togolaise des Consommateurs est une organisation indépendante à but non lucratif qui œuvre pour la protection des droits des consommateurs sur l'ensemble du territoire togolais.</p>
       
        <div class="footer-contact-simple">
          
          <div><i class="fas fa-envelope"></i> atctogo@yahoo.fr</div>
        </div>
      </div>

      <div class="footer-col">
        <h4>Liens rapides</h4>
        <ul>
          <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-chevron-right"></i> Accueil</a></li>
          <li><a href="<?php echo esc_url(home_url('/mot-du-directeur')); ?>"><i class="fas fa-chevron-right"></i> Mot du Président </a></li>
          <li><a href="<?php echo esc_url(home_url('/objectifs')); ?>"><i class="fas fa-chevron-right"></i> Objectifs</a></li>
          <li><a href="<?php echo esc_url(home_url('/activites')); ?>"><i class="fas fa-chevron-right"></i> Nos activités</a></li>
          <li><a href="<?php echo esc_url(home_url('/infos-pratiques')); ?>"><i class="fas fa-chevron-right"></i> Infos pratiques </a></li>
          <li><a href="<?php echo esc_url(home_url('/adhesion')); ?>"><i class="fas fa-chevron-right"></i> Devenir membre</a></li>
        </ul>
      </div>

      <div class="footer-col newsletter">
        <h4>Restez informé</h4>
        <p>Recevez nos alertes consommateurs, rappels de produits et conseils pratiques.</p>
        <form id="newsletterFormFooter" class="footer-newsletter">
          <div class="input-group">
            <input type="email" placeholder="Votre adresse email" required>
            <button type="submit"><i class="fas fa-paper-plane"></i></button>
          </div>
        </form>
        <p class="newsletter-note">Pas de spam – désinscription facile.</p>
        
      </div>
    </div>

    <!-- Bottom bar : copyright + mentions -->
    <div class="footer-bottom">
      <p>© <?php echo date('Y'); ?> togo green fund – Tous droits réservés.</p>
      <div class="legal">
      
        <a href="#" id="backToTopFooter"><i class="fas fa-arrow-up"></i> Haut de page</a>
      </div>
    </div>
  </div>
</footer>

<style>
/* ========== STYLES FOOTER — harmonisé avec header.php ==========
   Réutilise directement les variables --bleu / --rouge / --vert / --jaune
   déclarées sur :root dans header.php (avec repli si chargé seul). */
footer {
  background: linear-gradient(160deg, var(--bleu, #011875) 0%, #00041f 100%);
  color: #c7cef2;
  padding: 80px 0 30px;
  position: relative;
  overflow: hidden;
}

/* Liseré tricolore en haut — identique à celui du topbar du header */
footer::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg,
      var(--vert, #006B3F)  0%,  var(--vert, #006B3F)  33%,
      var(--jaune, #FFCC00) 33%, var(--jaune, #FFCC00) 66%,
      var(--rouge, #B92F29) 66%, var(--rouge, #B92F29) 100%);
}

.footer-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 50px;
  margin-bottom: 60px;
}

@media (max-width: 992px) {
  .footer-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .footer-grid { grid-template-columns: 1fr; gap: 40px; }
}

.footer-col h4 {
  font-family: 'Kumbh Sans', sans-serif;
  font-size: 0.85rem;
  font-weight: 800;
  color: var(--jaune, #FFCC00);
  letter-spacing: 2px;
  text-transform: uppercase;
  margin-bottom: 25px;
  position: relative;
  display: inline-block;
}

.footer-col h4::after {
  content: '';
  position: absolute;
  bottom: -8px;
  left: 0;
  width: 40px;
  height: 3px;
  background: var(--rouge, #B92F29);
  border-radius: 3px;
}

.footer-logo-badge {
  width: 58px;
  height: 58px;
  background: rgba(255,255,255,0.08);
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Playfair Display', serif;
  font-size: 1.5rem;
  font-weight: 900;
  color: #fff;
  margin-bottom: 20px;
  transition: transform .38s cubic-bezier(.4,0,.2,1);
}
.footer-logo-badge:hover { transform: scale(1.05); }
.footer-logo-badge span { color: var(--jaune, #FFCC00); }

.about p {
  color: #b9c2ea;
  line-height: 1.7;
  font-size: 0.9rem;
  margin-bottom: 20px;
}

.footer-address, .footer-contact-simple {
  margin-top: 15px;
  font-size: 0.85rem;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.footer-address i, .footer-contact-simple i {
  width: 28px;
  color: var(--jaune, #FFCC00);
  font-size: 1rem;
}
.footer-contact-simple div {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 8px;
}

.footer-col ul {
  list-style: none;
  padding: 0;
}
.footer-col ul li {
  margin-bottom: 12px;
}
.footer-col ul li a {
  color: #b9c2ea;
  text-decoration: none;
  font-size: 0.9rem;
  transition: all .38s cubic-bezier(.4,0,.2,1);
  display: inline-flex;
  align-items: center;
  gap: 8px;
}
.footer-col ul li a i {
  font-size: 0.7rem;
  transition: transform .38s cubic-bezier(.4,0,.2,1);
}
.footer-col ul li a:hover {
  color: #fff;
  transform: translateX(5px);
}
.footer-col ul li a:hover i {
  transform: translateX(3px);
  color: var(--jaune, #FFCC00);
}

.newsletter p {
  color: #b9c2ea;
  font-size: 0.9rem;
  margin-bottom: 20px;
}

.footer-newsletter .input-group {
  display: flex;
  gap: 10px;
  margin-bottom: 12px;
}
.footer-newsletter input {
  flex: 1;
  padding: 12px 18px;
  border-radius: 50px;
  border: 1px solid rgba(255,255,255,0.1);
  background: rgba(255,255,255,0.06);
  color: #fff;
  font-family: 'Kumbh Sans', sans-serif;
  font-size: 0.85rem;
  outline: none;
  transition: all .38s cubic-bezier(.4,0,.2,1);
}
.footer-newsletter input::placeholder {
  color: #8d97c9;
}
.footer-newsletter input:focus {
  border-color: var(--rouge, #B92F29);
  background: rgba(255,255,255,0.1);
}
.footer-newsletter button {
  background: linear-gradient(135deg, var(--rouge, #B92F29) 0%, var(--rouge-fonce, #8f1f1a) 100%);
  border: none;
  border-radius: 50px;
  width: 46px;
  height: 46px;
  color: #fff;
  cursor: pointer;
  transition: all .38s cubic-bezier(.4,0,.2,1);
  display: flex;
  align-items: center;
  justify-content: center;
}
.footer-newsletter button:hover {
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(185,47,41,.4);
}

.newsletter-note {
  font-size: 0.7rem;
  opacity: 0.7;
  margin: 10px 0 20px;
}

.footer-payment {
  margin-top: 20px;
  border-top: 1px solid rgba(255,255,255,0.08);
  padding-top: 20px;
}
.footer-payment span {
  font-size: 0.7rem;
  letter-spacing: 1px;
  display: block;
  margin-bottom: 10px;
  color: #b9c2ea;
}
.payment-icons {
  display: flex;
  gap: 15px;
  font-size: 1.5rem;
}
.payment-icons i {
  opacity: 0.6;
  transition: all .38s cubic-bezier(.4,0,.2,1);
}
.payment-icons i:hover {
  opacity: 1;
  transform: translateY(-3px);
  color: var(--jaune, #FFCC00);
}

.footer-bottom {
  border-top: 1px solid rgba(255,255,255,0.06);
  padding-top: 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 20px;
  font-size: 0.8rem;
}
.footer-bottom p {
  color: #8d97c9;
}
.legal {
  display: flex;
  gap: 25px;
  flex-wrap: wrap;
}
.legal a, #backToTopFooter {
  color: #8d97c9;
  text-decoration: none;
  transition: color .38s cubic-bezier(.4,0,.2,1);
  display: inline-flex;
  align-items: center;
  gap: 6px;
}
.legal a:hover, #backToTopFooter:hover {
  color: var(--jaune, #FFCC00);
}
#backToTopFooter i {
  font-size: 0.8rem;
}
@media (max-width: 768px) {
  .footer-bottom {
    flex-direction: column;
    text-align: center;
  }
  .legal {
    justify-content: center;
  }
}
</style>

<!-- ========== SCRIPTS JAVASCRIPT (tous les scripts du site) ========== -->
<script>
/* ── Navbar scroll ── */
const nav = document.getElementById('mainNav');
if (nav) {
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 40);
  });
}

/* ── Hamburger ── */
const ham = document.getElementById('hamburger');
const mNav = document.getElementById('mobileNav');
if (ham && mNav) {
  ham.addEventListener('click', () => {
    const open = mNav.classList.toggle('open');
    ham.setAttribute('aria-expanded', open);
    ham.querySelector('i').className = open ? 'fas fa-times' : 'fas fa-bars';
  });
  mNav.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', () => {
      mNav.classList.remove('open');
      ham.querySelector('i').className = 'fas fa-bars';
      ham.setAttribute('aria-expanded', 'false');
    });
  });
}

/* ── Slider (si présent) ── */
const track = document.getElementById('sliderTrack');
if (track) {
  const slides = track.querySelectorAll('.slide');
  const dotsEl = document.getElementById('sliderDots');
  let cur = 0, timer;

  slides.forEach((_, i) => {
    const d = document.createElement('button');
    d.className = 'sdot' + (i === 0 ? ' active' : '');
    d.setAttribute('aria-label', `Diapositive ${i + 1}`);
    d.addEventListener('click', () => goTo(i));
    if (dotsEl) dotsEl.appendChild(d);
  });

  function goTo(n) {
    slides[cur].classList.remove('active');
    if (dotsEl) dotsEl.children[cur].classList.remove('active');
    cur = (n + slides.length) % slides.length;
    slides[cur].classList.add('active');
    if (dotsEl) dotsEl.children[cur].classList.add('active');
    track.style.transform = `translateX(-${cur * 100}%)`;
    clearInterval(timer);
    timer = setInterval(() => goTo(cur + 1), 5500);
  }

  const prevBtn = document.getElementById('sliderPrev');
  const nextBtn = document.getElementById('sliderNext');
  if (prevBtn) prevBtn.addEventListener('click', () => goTo(cur - 1));
  if (nextBtn) nextBtn.addEventListener('click', () => goTo(cur + 1));
  timer = setInterval(() => goTo(cur + 1), 5500);
}

/* ── Read more (Mot du Directeur) ── */
const more = document.getElementById('directorMore');
const btnM = document.getElementById('btnMore');
if (btnM && more) {
  btnM.addEventListener('click', () => {
    const open = more.classList.toggle('open');
    btnM.setAttribute('aria-expanded', open);
    btnM.innerHTML = open
      ? 'Réduire <i class="fas fa-chevron-up"></i>'
      : 'Lire la suite <i class="fas fa-chevron-down"></i>';
  });
}

/* ── Tabs missions/objectifs ── */
document.querySelectorAll('.mo-tab').forEach(tab => {
  tab.addEventListener('click', () => {
    document.querySelectorAll('.mo-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.mo-panel').forEach(p => p.classList.remove('active'));
    tab.classList.add('active');
    document.getElementById('panel-' + tab.dataset.panel).classList.add('active');
  });
});

/* ── Reveal on scroll ── */
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
}, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

/* ── Smooth scroll pour les ancres ── */
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    const target = document.querySelector(a.getAttribute('href'));
    if (target) {
      e.preventDefault();
      window.scrollTo({ top: target.offsetTop - 76, behavior: 'smooth' });
    }
  });
});

/* ── Forms (adhésion et contact) ── */
const memberForm = document.getElementById('memberForm');
if (memberForm) {
  memberForm.addEventListener('submit', e => {
    e.preventDefault();
    alert('✅ Votre demande d\'adhésion a été enregistrée. Nous vous contacterons sous 48h.');
    e.target.reset();
  });
}
const contactForm = document.getElementById('contactForm');
if (contactForm) {
  contactForm.addEventListener('submit', e => {
    e.preventDefault();
    alert('✅ Message transmis avec succès. Nous vous répondons sous 24h.');
    e.target.reset();
  });
}

/* ── Newsletter du footer ── */
const newsletterFooter = document.getElementById('newsletterFormFooter');
if (newsletterFooter) {
  newsletterFooter.addEventListener('submit', (e) => {
    e.preventDefault();
    const input = newsletterFooter.querySelector('input[type="email"]');
    const email = input.value.trim();
    if (email && email.includes('@')) {
      alert(`✅ Merci ! ${email} est bien inscrit(e) à notre newsletter.`);
      input.value = '';
    } else {
      alert('Veuillez saisir une adresse email valide.');
    }
  });
}

/* ── Back to Top ── */
const backTop = document.getElementById('backToTopFooter');
if (backTop) {
  backTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}
</script>
</body>
</html>