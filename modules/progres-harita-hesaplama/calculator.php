<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_progres_harita_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-progres-harita',
        HC_PLUGIN_URL . 'modules/progres-harita-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-progres-harita-css',
        HC_PLUGIN_URL . 'modules/progres-harita-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-progres-harita">
        <div class="hc-header">
            <h3>Progres (İkincil İlerletilmiş) Harita Hesaplama</h3>
            <p class="hc-subtitle">Astrolojide "1 gün = 1 yıl" kuralıyla ruhsal olgunlaşmanızı, Progres Ay döngünüzü ve burç değiştiren gezegenlerinizi keşfedin.</p>
        </div>

        <div class="hc-form-grid-2">
            <div class="hc-form-group">
                <label for="hc-prog-birth">Doğum Tarihiniz *</label>
                <input type="date" id="hc-prog-birth" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-prog-year">Hedef Yıl / Yaşınız *</label>
                <input type="number" id="hc-prog-year" class="hc-input" value="2026" min="1900" max="2100" required>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcProgresHaritaHesapla()">⏳ Progres Haritayı Hesapla</button>

        <div class="hc-result" id="hc-progres-harita-result">
            <div class="hc-prog-hero" id="hc-prog-hero"></div>

            <div class="hc-prog-section">
                <h4 class="hc-prog-sec-title">🌙 İlerletilmiş Ay Fazı ve 29.5 Yıllık Ruh Döngüsü</h4>
                <div class="hc-prog-moon-box" id="hc-prog-moon-box"></div>
            </div>

            <div class="hc-prog-section">
                <h4 class="hc-prog-sec-title">🪐 Natal vs Progres Gezegen Karşılaştırması</h4>
                <div id="hc-prog-table-container"></div>
            </div>
        </div>
    </div>
    <?php
}
