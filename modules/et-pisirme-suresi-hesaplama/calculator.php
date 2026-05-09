<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_et_pisirme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-steak-time',
        HC_PLUGIN_URL . 'modules/et-pisirme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-steak-time-css',
        HC_PLUGIN_URL . 'modules/et-pisirme-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-steak-time">
        <h3>Et (Steak) Pişirme Süresi</h3>
        <div class="hc-form-group">
            <label for="hc-st-thick">Et Kalınlığı (cm)</label>
            <input type="number" id="hc-st-thick" value="2.5" step="0.5" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-st-level">Pişme Derecesi</label>
            <select id="hc-st-level">
                <option value="rare">Az Pişmiş (Rare)</option>
                <option value="med_rare" selected>Az-Orta (Medium Rare)</option>
                <option value="medium">Orta (Medium)</option>
                <option value="well">Tam Pişmiş (Well Done)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSteakTimeHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-steak-time-result">
            <div class="hc-result-item">
                <span>Her Yüz İçin Süre:</span>
                <span class="hc-result-value" id="hc-res-st-side">0 Dakika</span>
            </div>
            <p class="hc-st-note">Not: Etin pişmeden önce oda sıcaklığında olması ve piştikten sonra en az 5 dakika dinlendirilmesi önerilir.</p>
        </div>
    </div>
    <?php
}
