<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dis_derinligi_guvenlik_kontrolu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tread-safety',
        HC_PLUGIN_URL . 'modules/dis-derinligi-guvenlik-kontrolu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ts-box">
        <h3>Diş Derinliği Güvenlik Kontrolü</h3>
        <div class="hc-form-group">
            <label>Diş Derinliği (mm)</label>
            <input type="number" step="0.1" id="hc-ts-depth" placeholder="Örn: 4.5">
        </div>
        <button class="hc-btn" onclick="hcTsHesapla()">Kontrol Et</button>
        <div class="hc-result" id="hc-ts-result">
            <div id="hc-ts-status" style="font-weight: bold; margin-bottom: 10px; font-size: 1.2em;"></div>
            <div id="hc-ts-desc"></div>
            <p style="font-size: 0.8em; color: #888; margin-top: 15px;">* Türkiye yasal sınırı 1.6 mm'dir. Kış lastikleri için önerilen alt sınır 4 mm'dir.</p>
        </div>
    </div>
    <?php
}
