<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_semi_square_aci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-semi-square',
        HC_PLUGIN_URL . 'modules/semi-square-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-semi-square-css',
        HC_PLUGIN_URL . 'modules/semi-square-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-semi-square">
        <div class="hc-header">
            <h3>Semi-Square (45°) Açı Analizi</h3>
            <p>Hayatınızdaki huzursuzluk veren küçük ama sürekli engellerin kaynağını keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-sq-p1">1. Gezegen</label>
                <select id="hc-sq-p1" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-sq-p2">2. Gezegen</label>
                <select id="hc-sq-p2" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcSemiSquareHesapla()">Açıyı Analiz Et</button>

        <div class="hc-result" id="hc-sq-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Açı Teması:</span>
                <span class="hc-result-value" id="hc-sq-value">İçsel Sürtünme</span>
            </div>
            <div class="hc-result-content" id="hc-sq-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
