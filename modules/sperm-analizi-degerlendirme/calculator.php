<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sperm_analizi_degerlendirme( $atts ) {
    wp_enqueue_script(
        'hc-sperm-analizi',
        HC_PLUGIN_URL . 'modules/sperm-analizi-degerlendirme/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-sperm-analizi-degerlendirme">
        <h3>Sperm Analizi Değerlendirme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Miktar (Hacim) (ml)</label>
            <input type="number" id="hc-sperm-hacim" step="0.1" placeholder="Örn: 3.0">
        </div>
        <div class="hc-form-group">
            <label>Sperm Konsantrasyonu (milyon/ml)</label>
            <input type="number" id="hc-sperm-kons" step="1" placeholder="Örn: 25">
        </div>
        <div class="hc-form-group">
            <label>Toplam Hareketlilik (%)</label>
            <input type="number" id="hc-sperm-hareket" step="1" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label>Normal Morfoloji (%)</label>
            <input type="number" id="hc-sperm-morfo" step="1" placeholder="Örn: 5">
        </div>
        <button class="hc-btn" onclick="hcSpermAnaliziHesapla()">Değerlendir</button>
        <div class="hc-result" id="hc-sperm-result">
            <div class="hc-result-value" id="hc-sperm-status">-</div>
            <p id="hc-sperm-yorum"></p>
            <div class="hc-info-box" style="margin-top:15px; font-size:0.9em; opacity:0.8;">
                <strong>Not:</strong> Bu değerlendirme WHO 6. Baskı (2021) alt limitleri baz alınarak yapılmıştır. Kesin tanı için üroloji uzmanına başvurunuz.
            </div>
        </div>
    </div>
    <?php
}
