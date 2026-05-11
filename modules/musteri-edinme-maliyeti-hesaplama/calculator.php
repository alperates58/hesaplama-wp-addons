<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_musteri_edinme_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cac-calc',
        HC_PLUGIN_URL . 'modules/musteri-edinme-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cac-calc-css',
        HC_PLUGIN_URL . 'modules/musteri-edinme-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cac">
        <h3>Müşteri Edinme Maliyeti (CAC)</h3>
        <div class="hc-form-group">
            <label for="hc-cac-marketing">Toplam Pazarlama Gideri (₺)</label>
            <input type="number" id="hc-cac-marketing" placeholder="Örn: 20.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-cac-sales">Toplam Satış Gideri (Personel vb. ₺)</label>
            <input type="number" id="hc-cac-sales" placeholder="Örn: 10.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-cac-customers">Yeni Kazanılan Müşteri Sayısı</label>
            <input type="number" id="hc-cac-customers" placeholder="Örn: 100">
        </div>
        <button class="hc-btn" onclick="hcCacHesapla()">CAC Hesapla</button>
        <div class="hc-result" id="hc-cac-result">
            <div class="hc-result-item">
                <span>Müşteri Başı Maliyet (CAC):</span>
                <strong class="hc-result-value" id="hc-cac-value">-</strong>
            </div>
            <p class="hc-small-text">Düşük CAC, pazarlama stratejinizin verimli olduğunu gösterir.</p>
        </div>
    </div>
    <?php
}
