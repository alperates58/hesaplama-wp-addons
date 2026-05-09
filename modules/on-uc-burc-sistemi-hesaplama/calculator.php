<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_on_uc_burc_sistemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-on-uc-burc',
        HC_PLUGIN_URL . 'modules/on-uc-burc-sistemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-on-uc-burc-css',
        HC_PLUGIN_URL . 'modules/on-uc-burc-sistemi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-on-uc-burc-hesaplama">
        <h3>13 Burç Sistemi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-13burc-gun">Doğum Günü</label>
            <input type="number" id="hc-13burc-gun" placeholder="Örn: 15" min="1" max="31">
        </div>
        <div class="hc-form-group">
            <label for="hc-13burc-ay">Doğum Ayı</label>
            <select id="hc-13burc-ay">
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
        <button class="hc-btn" onclick="hc13BurcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-on-uc-burc-result">
            <div class="hc-result-label">13 Burç Sistemindeki Burcunuz:</div>
            <div class="hc-result-value" id="hc-13burc-value"></div>
            <div class="hc-result-desc" id="hc-13burc-desc"></div>
        </div>
    </div>
    <?php
}
