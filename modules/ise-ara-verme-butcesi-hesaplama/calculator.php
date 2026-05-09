<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ise_ara_verme_butcesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-career-break',
        HC_PLUGIN_URL . 'modules/ise-ara-verme-butcesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-career-break-css',
        HC_PLUGIN_URL . 'modules/ise-ara-verme-butcesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-career-break">
        <h3>İşe Ara Verme (Sabbatical) Bütçesi</h3>
        
        <div class="hc-form-group">
            <label for="hc-cb-monthly">Aylık Beklenen Gider (TL)</label>
            <input type="number" id="hc-cb-monthly" placeholder="Yaşam maliyeti">
        </div>

        <div class="hc-form-group">
            <label for="hc-cb-months">Ara Verilecek Süre (Ay)</label>
            <input type="number" id="hc-cb-months" value="6">
        </div>

        <div class="hc-form-group">
            <label for="hc-cb-buffer">Beklenmedik Gider Payı (%)</label>
            <input type="number" id="hc-cb-buffer" value="20">
        </div>
        
        <button class="hc-btn" onclick="hcCareerBreakHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-career-break-result">
            <div class="hc-result-value" id="hc-cb-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Hedeflenen Toplam Birikim Tutarı</p>
        </div>
    </div>
    <?php
}
