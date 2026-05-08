<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ofset_et_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-offset-calc',
        HC_PLUGIN_URL . 'modules/ofset-et-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-et-box">
        <h3>Jant Ofset Hesaplama</h3>
        <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="hc-form-section">
                <h4>Orijinal Jant</h4>
                <div class="hc-form-group"><label>Genişlik (J)</label><input type="number" id="hc-et-w1" placeholder="7.5" step="0.5"></div>
                <div class="hc-form-group"><label>Ofset (ET)</label><input type="number" id="hc-et-e1" placeholder="45"></div>
            </div>
            <div class="hc-form-section">
                <h4>Yeni Jant</h4>
                <div class="hc-form-group"><label>Genişlik (J)</label><input type="number" id="hc-et-w2" placeholder="8.5" step="0.5"></div>
                <div class="hc-form-group"><label>Ofset (ET)</label><input type="number" id="hc-et-e2" placeholder="35"></div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcEtHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-et-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>İç Kısım (Amortisör):</strong><br><span id="hc-et-inner">-</span></div>
                <div><strong>Dış Kısım (Çamurluk):</strong><br><span id="hc-et-outer">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
