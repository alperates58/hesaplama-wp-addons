<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_klima_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ac-calc',
        HC_PLUGIN_URL . 'modules/klima-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ac-calc-css',
        HC_PLUGIN_URL . 'modules/klima-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ac">
        <h3>Klima Kapasitesi (BTU) Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-ac-area">Alan (m²):</label>
            <input type="number" id="hc-ac-area" placeholder="25">
        </div>
        <div class="hc-form-group">
            <label for="hc-ac-region">Bölge:</label>
            <select id="hc-ac-region">
                <option value="365">Marmara / Karadeniz</option>
                <option value="400">İç Anadolu / Doğu Anadolu</option>
                <option value="445">Ege</option>
                <option value="480">Akdeniz / G. Doğu Anadolu</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ac-people">Kişi Sayısı:</label>
            <input type="number" id="hc-ac-people" value="2">
        </div>
        <button class="hc-btn" onclick="hcAcCalcHesapla()">Kapasiteyi Hesapla</button>
        <div class="hc-result" id="hc-ac-result">
            <strong>Gereken Kapasite:</strong>
            <div id="hc-ac-res-val" class="hc-result-value">-</div>
            <span>BTU / saat</span>
            <p id="hc-ac-res-rec" style="margin-top:10px; font-weight:bold; color:var(--hc-primary);"></p>
        </div>
    </div>
    <?php
}
