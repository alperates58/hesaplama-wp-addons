<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-hesaplama',
        HC_PLUGIN_URL . 'modules/burc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-hesaplama-css',
        HC_PLUGIN_URL . 'modules/burc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-hesaplama">
        <h3>Burç Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-burc-dogum-gun">Doğum Günü</label>
            <input type="number" id="hc-burc-dogum-gun" placeholder="Örn: 15" min="1" max="31">
        </div>
        <div class="hc-form-group">
            <label for="hc-burc-dogum-ay">Doğum Ayı</label>
            <select id="hc-burc-dogum-ay">
                <option value="1">Ocak</option>
                <option value="2">Şubat</option>
                <option value="3">Mart</option>
                <option value="4">Nisan</option>
                <option value="5">Mayıs</option>
                <option value="6">Haziran</option>
                <option value="7">Temmuz</option>
                <option value="8">Ağustos</option>
                <option value="9">Eylül</option>
                <option value="10">Ekim</option>
                <option value="11">Kasım</option>
                <option value="12">Aralık</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBurcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-burc-hesaplama-result">
            <div class="hc-result-label">Güneş Burcunuz:</div>
            <div class="hc-result-value" id="hc-burc-value"></div>
            <div class="hc-result-desc" id="hc-burc-desc"></div>
        </div>
    </div>
    <?php
}
