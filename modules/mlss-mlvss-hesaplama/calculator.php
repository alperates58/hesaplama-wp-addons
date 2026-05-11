<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mlss_mlvss_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mlss',
        HC_PLUGIN_URL . 'modules/mlss-mlvss-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mlss">
        <h3>MLSS / MLVSS Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ml-vol">Numune Hacmi (mL)</label>
            <input type="number" id="hc-ml-vol" placeholder="mL" step="any" value="50">
        </div>

        <div class="hc-form-group">
            <label for="hc-ml-total">Filtre Üzerindeki Toplam Katı Madde (mg)</label>
            <input type="number" id="hc-ml-total" placeholder="mg" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-ml-volatile">Yanma Sonrası Kaybolan Kütle (mg)</label>
            <input type="number" id="hc-ml-volatile" placeholder="mg" step="any">
        </div>

        <button class="hc-btn" onclick="hcMlssHesapla()">Analiz Et</button>

        <div class="hc-result" id="hc-ml-result">
            <div class="hc-result-item">
                <span class="hc-result-label">MLSS Konsantrasyonu:</span>
                <span class="hc-result-value" id="hc-ml-res-mlss">--</span>
                <span class="hc-result-unit">mg/L</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">MLVSS Konsantrasyonu:</span>
                <span class="hc-result-value" id="hc-ml-res-mlvss">--</span>
                <span class="hc-result-unit">mg/L</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Uçucu Oran (MLVSS/MLSS):</span>
                <span id="hc-ml-res-ratio">--</span>
            </div>
        </div>
    </div>
    <?php
}
