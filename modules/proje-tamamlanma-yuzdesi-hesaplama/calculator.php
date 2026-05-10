<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_proje_tamamlanma_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-project-pct',
        HC_PLUGIN_URL . 'modules/proje-tamamlanma-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-project-pct">
        <h3>Proje Tamamlanma Yüzdesi</h3>
        <div class="hc-form-group">
            <label for="hc-pp-done">Tamamlanan Görev Sayısı:</label>
            <input type="number" id="hc-pp-done" placeholder="45">
        </div>
        <div class="hc-form-group">
            <label for="hc-pp-total">Toplam Görev Sayısı:</label>
            <input type="number" id="hc-pp-total" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcProjectPctHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-project-pct-result">
            <strong>Tamamlanma Oranı:</strong>
            <div id="hc-pp-res-val" class="hc-result-value">-</div>
            <div class="hc-progress-bar" style="background:#eee; height:10px; border-radius:5px; margin-top:15px; overflow:hidden;">
                <div id="hc-pp-bar" style="background:var(--hc-primary); height:100%; width:0%; transition: width 0.5s;"></div>
            </div>
        </div>
    </div>
    <?php
}
