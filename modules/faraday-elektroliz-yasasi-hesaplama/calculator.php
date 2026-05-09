<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_faraday_elektroliz_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-faraday',
        HC_PLUGIN_URL . 'modules/faraday-elektroliz-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-faraday-css',
        HC_PLUGIN_URL . 'modules/faraday-elektroliz-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-faraday">
        <h3>Faraday Elektroliz Yasası (Mol/Eşdeğer)</h3>
        <div class="hc-form-group">
            <label for="hc-f-i">Akım (Amper)</label>
            <input type="number" id="hc-f-i" placeholder="A" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-f-t">Süre (Dakika)</label>
            <input type="number" id="hc-f-t" placeholder="dk" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-f-n">Tesir Değerliği (n)</label>
            <input type="number" id="hc-f-n" placeholder="n" value="1" step="any">
        </div>
        <button class="hc-btn" onclick="hcFaradayHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-f-result">
            <div class="hc-f-grid">
                <div class="hc-f-item"><span>Devreden Geçen Yük (Q):</span> <span id="hc-f-q">-</span></div>
                <div class="hc-f-item"><span>Mol Sayısı (n_mol):</span> <span id="hc-f-mol">-</span></div>
                <div class="hc-f-item"><span>Eşdeğer Gram Sayısı:</span> <span id="hc-f-eq">-</span></div>
            </div>
            <div class="hc-result-note">1 Faraday = 96485 Coulomb</div>
        </div>
    </div>
    <?php
}
