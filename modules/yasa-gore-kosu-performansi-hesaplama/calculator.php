<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yasa_gore_kosu_performansi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-age-grade',
        HC_PLUGIN_URL . 'modules/yasa-gore-kosu-performansi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-age-grade-css',
        HC_PLUGIN_URL . 'modules/yasa-gore-kosu-performansi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-age-grade">
        <h3>Yaş Grubu Performans Skoru</h3>
        <div class="hc-form-group">
            <label for="hc-ag-dist">Mesafe:</label>
            <select id="hc-ag-dist">
                <option value="5000">5K</option>
                <option value="10000">10K</option>
                <option value="21097">Yarı Maraton</option>
                <option value="42195">Maraton</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Süreniz (Dakika : Saniye):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-ag-min" placeholder="25" style="flex:1;">
                <input type="number" id="hc-ag-sec" placeholder="00" style="flex:1;">
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-ag-age">Yaşınız:</label>
            <input type="number" id="hc-ag-age" placeholder="40">
        </div>
        <button class="hc-btn" onclick="hcAgeGradeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-age-grade-result">
            <strong>Performans Skoru:</strong>
            <div id="hc-ag-res-val" class="hc-result-value">-</div>
            <span>%</span>
            <p id="hc-ag-res-desc" style="margin-top:15px; font-size:0.85rem;"></p>
        </div>
    </div>
    <?php
}
