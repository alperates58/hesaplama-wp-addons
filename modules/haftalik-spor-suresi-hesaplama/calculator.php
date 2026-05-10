<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_haftalik_spor_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-haftalik-spor-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/haftalik-spor-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-haftalik-spor-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/haftalik-spor-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-weekly">
        <h3>Haftalık Spor Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Günlük Egzersiz Süreleri (Dakika)</label>
            <div class="hc-days-grid">
                <div><label>Pzt</label><input type="number" class="hc-day-min" value="0"></div>
                <div><label>Sal</label><input type="number" class="hc-day-min" value="0"></div>
                <div><label>Çar</label><input type="number" class="hc-day-min" value="0"></div>
                <div><label>Per</label><input type="number" class="hc-day-min" value="0"></div>
                <div><label>Cum</label><input type="number" class="hc-day-min" value="0"></div>
                <div><label>Cmt</label><input type="number" class="hc-day-min" value="0"></div>
                <div><label>Paz</label><input type="number" class="hc-day-min" value="0"></div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcHaftalikSporSuresiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-weekly-result">
            <div class="hc-result-label">Toplam Haftalık Süre:</div>
            <div class="hc-result-value" id="hc-weekly-val">-</div>
            <div id="hc-weekly-comment" style="margin-top: 10px;"></div>
        </div>
    </div>
    <?php
}
