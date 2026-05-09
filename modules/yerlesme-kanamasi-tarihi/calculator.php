<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yerlesme_kanamasi_tarihi( $atts ) {
    wp_enqueue_script(
        'hc-implantation',
        HC_PLUGIN_URL . 'modules/yerlesme-kanamasi-tarihi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-impl-box">
        <h3>Yerleşme Kanaması Tarihi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-it-lmp">Son Adet Tarihi (SAT)</label>
            <input type="date" id="hc-it-lmp">
        </div>

        <div class="hc-form-group">
            <label for="hc-it-cycle">Döngü Süresi (Gün)</label>
            <input type="number" id="hc-it-cycle" value="28">
        </div>

        <button class="hc-btn" onclick="hcYerlesmeHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-yerlesme-result">
            <div class="hc-result-item">
                <span>Muhtemel Yerleşme Aralığı:</span>
                <div class="hc-result-value" id="hc-it-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Yerleşme kanaması genellikle yumurtlamadan 6-12 gün sonra gerçekleşir. Her kadında görülmeyebilir.
            </p>
        </div>
    </div>
    <?php
}
