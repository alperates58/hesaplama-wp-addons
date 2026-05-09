<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_agirlikli_not_ortalamasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gpa-calc',
        HC_PLUGIN_URL . 'modules/agirlikli-not-ortalamasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gpa-calc-css',
        HC_PLUGIN_URL . 'modules/agirlikli-not-ortalamasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gpa">
        <h3>Ağırlıklı Not Ortalaması</h3>
        
        <div id="hc-gpa-rows">
            <div class="hc-gpa-row">
                <input type="text" placeholder="Ders Adı" class="hc-gpa-name">
                <input type="number" placeholder="Not" class="hc-gpa-grade" step="0.01">
                <input type="number" placeholder="Kredi" class="hc-gpa-credit" step="0.1">
            </div>
            <div class="hc-gpa-row">
                <input type="text" placeholder="Ders Adı" class="hc-gpa-name">
                <input type="number" placeholder="Not" class="hc-gpa-grade" step="0.01">
                <input type="number" placeholder="Kredi" class="hc-gpa-credit" step="0.1">
            </div>
        </div>

        <button class="hc-btn-secondary" onclick="hcGpaSatirEkle()">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcGpaHesapla()">Ortalamayı Hesapla</button>

        <div class="hc-result" id="hc-gpa-result">
            <div class="hc-result-item">
                <span>Genel Ortalama:</span>
                <span class="hc-result-value highlight" id="hc-res-gpa-val">-</span>
            </div>
            <div class="hc-result-item">
                <span>Toplam Kredi:</span>
                <span class="hc-result-value" id="hc-res-gpa-credits">-</span>
            </div>
        </div>
    </div>
    <?php
}
