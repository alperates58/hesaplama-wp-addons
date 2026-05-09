<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ikiz_gebelikte_kilo_alimi( $atts ) {
    wp_enqueue_script(
        'hc-twin-preg-weight',
        HC_PLUGIN_URL . 'modules/ikiz-gebelikte-kilo-alimi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-twin-pw-box">
        <h3>İkiz Gebelikte Kilo Alımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-tp-height">Boyunuz (cm)</label>
            <input type="number" id="hc-tp-height" placeholder="cm">
        </div>

        <div class="hc-form-group">
            <label for="hc-tp-weight">Hamilelik Öncesi Kilonuz (kg)</label>
            <input type="number" id="hc-tp-weight" placeholder="kg">
        </div>

        <button class="hc-btn" onclick="hcIkizKiloHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-twin-preg-weight-result">
            <div class="hc-result-item">
                <span>Önerilen Toplam Artış:</span>
                <div class="hc-result-value" id="hc-tp-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *İkiz gebeliklerde besin ihtiyacı daha yüksek olduğu için kilo alımı tekil gebeliklere göre daha fazladır.
            </p>
        </div>
    </div>
    <?php
}
