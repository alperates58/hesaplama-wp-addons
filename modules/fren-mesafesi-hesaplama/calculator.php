<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fren_mesafesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-braking-calc',
        HC_PLUGIN_URL . 'modules/fren-mesafesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-brk-box">
        <h3>Frenleme Mesafesi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Hız (km/h)</label>
            <input type="number" id="hc-brk-speed" value="90">
        </div>
        <div class="hc-form-group">
            <label>Yol Koşulu</label>
            <select id="hc-brk-surface">
                <option value="0.7">Kuru Asfalt (f=0.7)</option>
                <option value="0.4">Islak Yol (f=0.4)</option>
                <option value="0.2">Karlı Yol (f=0.2)</option>
                <option value="0.1">Buzlu Yol (f=0.1)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBrkHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-brk-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Fren Mesafesi:</strong><br><span id="hc-brk-dist">-</span></div>
                <div><strong>Toplam Duruş:</strong><br><span id="hc-brk-total">-</span></div>
            </div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* Toplam duruş mesafesi 1 saniyelik reaksiyon süresini içerir.</p>
        </div>
    </div>
    <?php
}
