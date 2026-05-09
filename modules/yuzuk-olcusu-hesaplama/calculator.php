<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzuk_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yuzuk-olcu',
        HC_PLUGIN_URL . 'modules/yuzuk-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yuzuk-olcu-css',
        HC_PLUGIN_URL . 'modules/yuzuk-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yuzuk-olcu">
        <h3>Yüzük Ölçüsü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ring-circum">Parmak Çevresi (mm)</label>
            <input type="number" id="hc-ring-circum" placeholder="Örn: 54" min="40" max="80" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcYuzukOlcuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yuzuk-olcu-result">
            <div class="hc-result-item">
                <span>Yüzük Ölçünüz:</span>
                <span class="hc-result-value" id="hc-res-ring-size">0</span>
            </div>
            <p class="hc-info">Ölçüm yaparken parmağınızın en geniş kısmını (eklem yerini) baz almanız önerilir.</p>
        </div>
    </div>
    <?php
}
