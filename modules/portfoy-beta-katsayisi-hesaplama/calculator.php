<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_portfoy_beta_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-portfoy-beta',
        HC_PLUGIN_URL . 'modules/portfoy-beta-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-portfoy-beta-css',
        HC_PLUGIN_URL . 'modules/portfoy-beta-katsayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-p-beta">
        <h3>Portföy Beta Katsayısı Hesaplama</h3>
        <div id="hc-p-beta-items">
            <div class="hc-p-beta-row">
                <input type="text" class="hc-pb-name" placeholder="Hisse Adı">
                <input type="number" class="hc-pb-weight" placeholder="Ağırlık (%)">
                <input type="number" class="hc-pb-beta" placeholder="Beta (β)" step="0.01">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcPortfoyBetaSatirEkle()" style="margin-bottom: 15px;">+ Hisse Ekle</button>
        <button class="hc-btn" onclick="hcPortfoyBetaHesapla()">Portföy Betasını Hesapla</button>
        <div class="hc-result" id="hc-p-beta-result">
            <div class="hc-result-item">
                <span>Portföy Beta Katsayısı:</span>
                <strong class="hc-result-value" id="hc-p-beta-res-total">-</strong>
            </div>
            <p id="hc-p-beta-comment" class="hc-small-text"></p>
        </div>
    </div>
    <?php
}
