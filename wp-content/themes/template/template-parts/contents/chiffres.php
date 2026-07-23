<?php
// Récupérer les statistiques depuis les options WordPress
$stats = get_option( 'atc_stats_data', array() );
$defaults = array(
    'adherents'       => '5 000+',
    'adherents_label' => 'Adhérents actifs',
    'years'           => '30+',
    'years_label'     => "Années d'expérience",
    'resolution'      => '80%',
    'resolution_label' => 'Litiges résolus',
    'antennes'        => '6',
    'antennes_label'  => 'Antennes régionales'
);
$stats = wp_parse_args( $stats, $defaults );
?>

<div class="stats-band reveal">
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-users"></i></div>
        <div class="stat-number"><?php echo esc_html( $stats['adherents'] ); ?></div>
        <div class="stat-label"><?php echo esc_html( $stats['adherents_label'] ); ?></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-calendar-alt"></i></div>
        <div class="stat-number"><?php echo esc_html( $stats['years'] ); ?></div>
        <div class="stat-label"><?php echo esc_html( $stats['years_label'] ); ?></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-handshake"></i></div>
        <div class="stat-number"><?php echo esc_html( $stats['resolution'] ); ?></div>
        <div class="stat-label"><?php echo esc_html( $stats['resolution_label'] ); ?></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-map-marker-alt"></i></div>
        <div class="stat-number"><?php echo esc_html( $stats['antennes'] ); ?></div>
        <div class="stat-label"><?php echo esc_html( $stats['antennes_label'] ); ?></div>
    </div>
</div>

<style>
/* ============================================================
   STATS BAND – DESIGN ÉLÉGANT ET CHARTE ATC
   ============================================================ */
.stats-band {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 25px;
    margin-top: 50px;
    padding: 0;
}

.stat-card {
    background: #ffffff;
    border-radius: 28px;
    padding: 30px 20px 25px;
    text-align: center;
    box-shadow: 0 8px 28px rgba(1,24,117,0.07);
    border: 1px solid rgba(1,24,117,0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    position: relative;
    overflow: hidden;
}

/* Petit trait coloré en haut de chaque carte */
.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #011875, #B92F29, #FFCC00);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.stat-card:hover::before {
    opacity: 1;
}

.stat-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 40px rgba(1,24,117,0.12);
    border-color: rgba(1,24,117,0.15);
}

/* Icône */
.stat-icon {
    width: 60px;
    height: 60px;
    background: rgba(1,24,117,0.06);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    transition: background 0.3s ease, transform 0.3s ease;
}
.stat-icon i {
    font-size: 1.6rem;
    color: #011875;
    transition: color 0.3s ease;
}
.stat-card:hover .stat-icon {
    background: #011875;
    transform: scale(1.05) rotate(-2deg);
}
.stat-card:hover .stat-icon i {
    color: #ffffff;
}

/* Nombre */
.stat-number {
    font-family: 'Playfair Display', serif;
    font-size: 2.8rem;
    font-weight: 900;
    color: #011875;
    line-height: 1.2;
    letter-spacing: -1px;
    margin-bottom: 6px;
}

/* Label */
.stat-label {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    color: #4b5563;
    background: rgba(185,47,41,0.06);
    display: inline-block;
    padding: 4px 16px;
    border-radius: 40px;
    border: 1px solid rgba(185,47,41,0.08);
    transition: background 0.3s ease, color 0.3s ease;
}
.stat-card:hover .stat-label {
    background: rgba(185,47,41,0.12);
    color: #B92F29;
}

/* Responsive */
@media (max-width: 992px) {
    .stats-band {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    .stat-number {
        font-size: 2.4rem;
    }
}

@media (max-width: 576px) {
    .stats-band {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    .stat-card {
        padding: 24px 16px 20px;
    }
    .stat-number {
        font-size: 2rem;
    }
    .stat-icon {
        width: 50px;
        height: 50px;
    }
    .stat-icon i {
        font-size: 1.3rem;
    }
}
</style>