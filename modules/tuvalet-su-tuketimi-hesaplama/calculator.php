<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tuvalet_su_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tuvalet-su-tuketimi-hesaplama',
        HC_PLUGIN_URL . 'modules/tuvalet-su-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tuvalet-su-tuketimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tuvalet-su-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-toilet-water">
        <h3>Tuvalet Su Tüketimi</h3>
        <div class="hc-form-group">
            <label for="hc-tw-flushes">Günlük Sifon Kullanımı (Adet)</label>
            <input type="number" id="hc-tw-flushes" value="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-tw-type">Rezervuar Tipi</label>
            <select id="hc-tw-type">
                <option value="9">Eski Tip (9 Litre)</option>
                <option value="6" selected>Standart (6 Litre)</option>
                <option value="4.5">Çift Kademeli / Tasarruflu (4.5 L ort.)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTuvaletSuTüketimiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tw-result">
            <div class="hc-result-label">Yıllık Tüketim:</div>
            <div class="hc-result-value" id="hc-tw-val">-</div>
            <p id="hc-tw-info" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
