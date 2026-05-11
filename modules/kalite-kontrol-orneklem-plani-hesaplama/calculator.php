<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kalite_kontrol_orneklem_plani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aql-sample',
        HC_PLUGIN_URL . 'modules/kalite-kontrol-orneklem-plani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-aql-sample">
        <h3>Kalite Kontrol Örneklem Planı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Parti (Lot) Büyüklüğü</label>
            <input type="number" id="hc-qc-lot" placeholder="Örn: 5000" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Güven Aralığı (Slovin's Hata Payı)</label>
            <select id="hc-qc-error">
                <option value="0.01">1% Hata Payı (Yüksek Hassasiyet)</option>
                <option value="0.05" selected>5% Hata Payı (Standart)</option>
                <option value="0.10">10% Hata Payı (Düşük Hassasiyet)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcQcSampleHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-qc-result">
            <span>Minimum Örneklem Sayısı (n):</span>
            <div class="hc-result-value" id="hc-qc-res-val">0</div>
            <small>Formül: n = N / (1 + N·e²)</small>
        </div>
    </div>
    <?php
}
