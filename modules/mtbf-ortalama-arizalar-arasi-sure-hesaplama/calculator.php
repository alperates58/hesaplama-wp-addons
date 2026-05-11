<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mtbf_ortalama_arizalar_arasi_sure_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mtbf',
        HC_PLUGIN_URL . 'modules/mtbf-ortalama-arizalar-arasi-sure-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mtbf">
        <h3>MTBF (Arızalar Arası Ortalama Süre) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mtbf-uptime">Toplam Çalışma Süresi (Saat)</label>
            <input type="number" id="hc-mtbf-uptime" placeholder="Uptime (saat)" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-mtbf-count">Toplam Arıza Sayısı</label>
            <input type="number" id="hc-mtbf-count" placeholder="Adet" step="1">
        </div>

        <button class="hc-btn" onclick="hcMtbfHesapla()">MTBF Hesapla</button>

        <div class="hc-result" id="hc-mtbf-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Arızalar Arası Ortalama Süre:</span>
                <span class="hc-result-value" id="hc-mtbf-res-total">--</span>
                <span class="hc-result-unit">Saat</span>
            </div>
        </div>
    </div>
    <?php
}
