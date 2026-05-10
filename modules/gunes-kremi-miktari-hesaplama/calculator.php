<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_kremi_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gunes-kremi-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/gunes-kremi-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gunes-kremi-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gunes-kremi-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sunscreen">
        <h3>Güneş Kremi Miktarı</h3>
        <div class="hc-form-group">
            <label>Korunacak Bölgeler</label>
            <div class="hc-check-grid">
                <label><input type="checkbox" class="hc-sk-area" value="0.09"> Yüz ve Boyun</label>
                <label><input type="checkbox" class="hc-sk-area" value="0.18"> Gövde (Ön ve Arka)</label>
                <label><input type="checkbox" class="hc-sk-area" value="0.18"> Kollar</label>
                <label><input type="checkbox" class="hc-sk-area" value="0.36"> Bacaklar</label>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-sk-height">Boyunuz (cm)</label>
            <input type="number" id="hc-sk-height" value="175">
        </div>
        <div class="hc-form-group">
            <label for="hc-sk-weight">Kilonuz (kg)</label>
            <input type="number" id="hc-sk-weight" value="70">
        </div>
        <button class="hc-btn" onclick="hcGüneşKremiMiktarıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sk-result">
            <div class="hc-result-label">Gereken Miktar:</div>
            <div class="hc-result-value" id="hc-sk-val">-</div>
            <p style="font-size:0.85em; margin-top:10px; color:#666;">*Dünya Sağlık Örgütü standartlarına göre 2 mg/cm² baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
