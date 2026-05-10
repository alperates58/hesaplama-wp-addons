<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_zincir_uzunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bisiklet-zincir-uzunlugu-hesaplama',
        HC_PLUGIN_URL . 'modules/bisiklet-zincir-uzunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bisiklet-zincir-uzunlugu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bisiklet-zincir-uzunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-chain">
        <h3>Bisiklet Zincir Uzunluğu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-chain-stay">Arka Çatal Uzunluğu (Chainstay - cm)</label>
            <input type="number" id="hc-chain-stay" placeholder="Örn: 40.5" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-chain-front">En Büyük Aynakol Diş Sayısı</label>
            <input type="number" id="hc-chain-front" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-chain-rear">En Büyük Ruble Diş Sayısı</label>
            <input type="number" id="hc-chain-rear" placeholder="Örn: 28">
        </div>
        <button class="hc-btn" onclick="hcBisikletZincirUzunluguHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-chain-result">
            <div class="hc-result-label">Gereken Zincir Uzunluğu:</div>
            <div class="hc-result-value" id="hc-chain-val">-</div>
            <p style="font-size: 0.85em; color: #666; margin-top: 10px;">*Hesaplanan değer en yakın çift sayıya (bakla) yuvarlanmıştır.</p>
        </div>
    </div>
    <?php
}
