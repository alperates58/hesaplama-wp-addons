<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_el_kurutma_makinesi_ve_kagit_havlu_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hand-dry',
        HC_PLUGIN_URL . 'modules/el-kurutma-makinesi-ve-kagit-havlu-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hand-dry-css',
        HC_PLUGIN_URL . 'modules/el-kurutma-makinesi-ve-kagit-havlu-karsilastirma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hand-dry">
        <h3>El Kurutma Yöntemleri Karşılaştırması</h3>
        <div class="hc-form-group">
            <label for="hc-dry-uses">Günlük Kullanım Sayısı</label>
            <input type="number" id="hc-dry-uses" placeholder="Örn: 5" min="1" value="5">
        </div>
        <button class="hc-btn" onclick="hcHandDryKarsilastir()">Karşılaştır</button>
        <div class="hc-result" id="hc-hand-dry-result">
            <div class="hc-res-item">
                <span>Kağıt Havlu (Yıllık CO2):</span>
                <span id="hc-res-paper-co2">0 kg</span>
            </div>
            <div class="hc-res-item">
                <span>El Kurutma Makinesi (Yıllık CO2):</span>
                <span id="hc-res-dryer-co2">0 kg</span>
            </div>
            <div class="hc-res-winner">
                <p id="hc-res-dry-winner">En çevreci yöntem: ...</p>
            </div>
        </div>
    </div>
    <?php
}
