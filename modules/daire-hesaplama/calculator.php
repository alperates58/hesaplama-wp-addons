<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_daire_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-daire-hesaplama', HC_PLUGIN_URL . 'modules/daire-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-daire-hesaplama-css', HC_PLUGIN_URL . 'modules/daire-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-daire-hesaplama">
        <h3>Daire Hesaplama</h3>
        <p style="font-size:13px;color:#666;">Aşağıdaki dört değerden yalnızca birini girin; diğerleri otomatik hesaplanır.</p>
        <div class="hc-form-group">
            <label for="hc-dh-r">Yarıçap — r (m)</label>
            <input type="number" id="hc-dh-r" placeholder="m" step="any" min="0" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dh-d">Çap — d (m)</label>
            <input type="number" id="hc-dh-d" placeholder="m" step="any" min="0" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dh-c">Çevre — C (m)</label>
            <input type="number" id="hc-dh-c" placeholder="m" step="any" min="0" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dh-a">Alan — A (m²)</label>
            <input type="number" id="hc-dh-a" placeholder="m²" step="any" min="0" />
        </div>
        <button class="hc-btn" onclick="hcDaireHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-daire-hesaplama-result"></div>
    </div>
    <?php
}
