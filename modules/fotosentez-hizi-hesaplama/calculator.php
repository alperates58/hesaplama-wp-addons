<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fotosentez_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fotosentez-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/fotosentez-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fotosentez-hizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/fotosentez-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fotosentez-hizi-hesaplama">
        <h3>Göreceli Fotosentez Hızı Hesaplama</h3>
        <p style="font-size: 0.85em; margin-bottom: 15px; opacity: 0.8;">Faktörlerin doygunluk etkisini temel alan teorik model.</p>
        <div class="hc-form-group">
            <label for="hc-photo-light">Işık Şiddeti (µmol photons/m²/s)</label>
            <input type="number" id="hc-photo-light" placeholder="Örn: 500" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-photo-co2">CO₂ Konsantrasyonu (ppm)</label>
            <input type="number" id="hc-photo-co2" placeholder="Örn: 400" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-photo-temp">Sıcaklık (°C)</label>
            <input type="number" id="hc-photo-temp" placeholder="Örn: 25" step="any">
        </div>
        <button class="hc-btn" onclick="hcFotosentezHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-photo-result">
            <div class="hc-result-label">Göreceli Hız (0-100%):</div>
            <div class="hc-result-value" id="hc-photo-val">-</div>
            <div class="hc-result-note" id="hc-photo-note"></div>
        </div>
    </div>
    <?php
}
