<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basabas_noktasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-basabas-noktasi-hesaplama',
        HC_PLUGIN_URL . 'modules/basabas-noktasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-basabas-noktasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/basabas-noktasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-basabas-noktasi">
        <h3>Başabaş Noktası Hesaplama (BEP)</h3>
        <div class="hc-form-group">
            <label for="hc-bep-fixed">Toplam Sabit Maliyetler (Kira, Maaşlar vb. ₺)</label>
            <input type="number" id="hc-bep-fixed" placeholder="Örn: 50.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-bep-price">Birim Satış Fiyatı (₺)</label>
            <input type="number" id="hc-bep-price" placeholder="Örn: 200">
        </div>
        <div class="hc-form-group">
            <label for="hc-bep-variable">Birim Değişken Maliyet (Hammadde vb. ₺)</label>
            <input type="number" id="hc-bep-variable" placeholder="Örn: 120">
        </div>
        <button class="hc-btn" onclick="hcBasabasNoktasıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bep-result">
            <div class="hc-result-item">
                <span>Başabaş Noktası (Birim):</span>
                <strong class="hc-result-value" id="hc-bep-units">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Başabaş Noktası (Ciro - ₺):</span>
                <strong id="hc-bep-revenue">-</strong>
            </div>
            <p class="hc-small-text">Bu miktarda satış yapıldığında kâr veya zarar oluşmaz (Eşitlik noktası).</p>
        </div>
    </div>
    <?php
}
