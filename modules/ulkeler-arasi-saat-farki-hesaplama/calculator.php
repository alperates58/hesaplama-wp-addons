<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ulkeler_arasi_saat_farki_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-saat-farki',
        HC_PLUGIN_URL . 'modules/ulkeler-arasi-saat-farki-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ulkeler-arasi-saat-farki-hesaplama">
        <h3>Ülkeler Arası Saat Farkı Hesaplama</h3>
        <div class="hc-form-group">
            <label>1. Şehir / Bölge</label>
            <select id="hc-sf-tz1">
                <option value="Europe/Istanbul">İstanbul (Türkiye)</option>
                <option value="Europe/London">Londra (İngiltere)</option>
                <option value="America/New_York">New York (ABD)</option>
                <option value="Asia/Tokyo">Tokyo (Japonya)</option>
                <option value="Europe/Berlin">Berlin (Almanya)</option>
                <option value="Asia/Dubai">Dubai (BAE)</option>
                <option value="Australia/Sydney">Sidney (Avustralya)</option>
                <option value="America/Los_Angeles">Los Angeles (ABD)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>2. Şehir / Bölge</label>
            <select id="hc-sf-tz2">
                <option value="Europe/London">Londra (İngiltere)</option>
                <option value="Europe/Istanbul">İstanbul (Türkiye)</option>
                <option value="America/New_York">New York (ABD)</option>
                <option value="Asia/Tokyo">Tokyo (Japonya)</option>
                <option value="Europe/Berlin">Berlin (Almanya)</option>
                <option value="Asia/Dubai">Dubai (BAE)</option>
                <option value="Australia/Sydney">Sidney (Avustralya)</option>
                <option value="America/Los_Angeles">Los Angeles (ABD)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSaatFarkiHesapla()">Farkı Hesapla</button>
        <div class="hc-result" id="hc-sf-result">
            <div class="hc-result-value" id="hc-sf-val" style="font-size: 24px;">-</div>
            <div style="margin-top: 10px; font-size: 14px;" id="hc-sf-info"></div>
        </div>
    </div>
    <?php
}
