<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sansli_tas_bulucu( $atts ) {
    wp_enqueue_script(
        'hc-stone-finder',
        HC_PLUGIN_URL . 'modules/sansli-tas-bulucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stone-finder-css',
        HC_PLUGIN_URL . 'modules/sansli-tas-bulucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sansli-tas-bulucu">
        <h3>Şanslı Taş Bulucu</h3>
        <div class="hc-form-group">
            <label for="hc-tas-burc">Burcunuz</label>
            <select id="hc-tas-burc">
                <option value="Koç">Koç</option>
                <option value="Boğa">Boğa</option>
                <option value="İkizler">İkizler</option>
                <option value="Yengeç">Yengeç</option>
                <option value="Aslan">Aslan</option>
                <option value="Başak">Başak</option>
                <option value="Terazi">Terazi</option>
                <option value="Akrep">Akrep</option>
                <option value="Yay">Yay</option>
                <option value="Oğlak">Oğlak</option>
                <option value="Kova">Kova</option>
                <option value="Balık">Balık</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTasBul()">Taşlarımı Bul</button>
        <div class="hc-result" id="hc-tas-result">
            <div class="hc-result-label">Size Uygun Taşlar:</div>
            <div class="hc-result-value" id="hc-tas-val"></div>
            <div class="hc-result-desc" id="hc-tas-desc"></div>
        </div>
    </div>
    <?php
}
