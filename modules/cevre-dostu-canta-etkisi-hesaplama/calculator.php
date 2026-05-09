<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cevre_dostu_canta_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cevre-canta',
        HC_PLUGIN_URL . 'modules/cevre-dostu-canta-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cevre-canta-css',
        HC_PLUGIN_URL . 'modules/cevre-dostu-canta-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cevre-canta">
        <h3>Çevre Dostu Çanta Etkisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bag-saved">Haftalık Tasarruf Edilen Poşet Sayısı</label>
            <input type="number" id="hc-bag-saved" placeholder="Örn: 10" min="1" value="10">
        </div>
        <button class="hc-btn" onclick="hcCevreCantaHesapla()">Etkiyi Hesapla</button>
        <div class="hc-result" id="hc-cevre-canta-result">
            <div class="hc-result-item">
                <span>Yıllık Önlenen Plastik:</span>
                <span class="hc-result-value" id="hc-res-bag-plastic">0 kg</span>
            </div>
            <div class="hc-result-item">
                <span>Önlenen CO2 Salınımı:</span>
                <span id="hc-res-bag-co2">0 kg</span>
            </div>
            <div class="hc-bag-tip">
                <p>Bir pamuklu çantanın plastik poşetten daha çevreci olması için en az 131 kez kullanılması gerektiğini biliyor muydunuz?</p>
            </div>
        </div>
    </div>
    <?php
}
