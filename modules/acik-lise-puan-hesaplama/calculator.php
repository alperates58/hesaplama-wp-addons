<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_acik_lise_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-acik-lise-calc',
        HC_PLUGIN_URL . 'modules/acik-lise-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-aol-calc">
        <h3>Açık Lise Puan Hesaplama</h3>
        <div id="hc-aol-rows">
            <div class="hc-form-group hc-aol-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="number" step="1" class="hc-aol-score" placeholder="Puan (0-100)" style="flex: 1;">
                <input type="number" step="1" class="hc-aol-credit" placeholder="Kredi" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcAolAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcAolHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-aol-result">
            <div class="hc-result-title">Dönem Ortalama Puanı:</div>
            <div class="hc-result-value" id="hc-aol-val">-</div>
            <p style="font-size: 12px; margin-top: 10px; color: #666;">* Açık Lise'de bir dersten başarılı olmak için en az 45 puan gereklidir.</p>
        </div>
    </div>
    <?php
}
