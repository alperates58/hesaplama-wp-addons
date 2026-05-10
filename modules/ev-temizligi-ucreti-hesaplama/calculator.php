<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ev_temizligi_ucreti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-temizligi-ucreti-hesaplama',
        HC_PLUGIN_URL . 'modules/ev-temizligi-ucreti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ev-temizligi-ucreti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ev-temizligi-ucreti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cleaning">
        <h3>Ev Temizliği Ücret Hesaplama (2026)</h3>
        <div class="hc-form-group">
            <label for="hc-cl-type">Daire Tipi</label>
            <select id="hc-cl-type">
                <option value="2000">1+1 Daire</option>
                <option value="3500" selected>2+1 Daire</option>
                <option value="5000">3+1 Daire</option>
                <option value="6500">4+1 Daire / Dubleks</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-cl-mode">Temizlik Türü</label>
            <select id="hc-cl-mode">
                <option value="1.0">Standart (Rutin)</option>
                <option value="1.5">Detaylı / İnşaat Sonrası</option>
                <option value="0.8">Yarım Gün (Sadece 4 Saat)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcEvTemizliğiÜcretiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cl-result">
            <div class="hc-result-label">Tahmini Ücret:</div>
            <div class="hc-result-value" id="hc-cl-val">-</div>
            <p style="font-size:0.85em; margin-top:10px; color:#666;">*Fiyatlar 2026 Nisan ayı piyasa ortalamalarıdır. Ekstra hizmetler (ütü, cam silme vb.) dahil değildir.</p>
        </div>
    </div>
    <?php
}
