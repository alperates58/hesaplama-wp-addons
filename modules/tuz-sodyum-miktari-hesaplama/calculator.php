<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tuz_sodyum_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-salt-sodium',
        HC_PLUGIN_URL . 'modules/tuz-sodyum-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-salt-sodium">
        <h3>Tuzdaki Sodyum Miktarı</h3>
        
        <div class="hc-form-group">
            <label for="hc-ss-salt">Tuz Miktarı (Gram)</label>
            <input type="number" id="hc-ss-salt" placeholder="Gram">
        </div>

        <div style="text-align: center; margin: 10px 0; font-size: 1.2em;">⇅</div>

        <div class="hc-form-group">
            <label for="hc-ss-sodium">Sodyum Miktarı (Miligram)</label>
            <input type="number" id="hc-ss-sodium" placeholder="Miligram">
        </div>

        <button class="hc-btn" onclick="hcSodyumHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-salt-sodium-result">
            <div class="hc-result-item">
                <span>Hesaplanan Değer:</span>
                <div class="hc-result-value" id="hc-ss-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *1 gram tuz yaklaşık 400 mg sodyum içerir. Tam tersi olarak, sodyum miktarını 2.5 ile çarparak tuz miktarını bulabilirsiniz.
            </p>
        </div>
    </div>
    <?php
}
