<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_grubu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-grubu',
        HC_PLUGIN_URL . 'modules/burc-grubu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-grubu-css',
        HC_PLUGIN_URL . 'modules/burc-grubu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-grubu-hesaplama">
        <h3>Burç Grubu (Niteliği) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-grub-burc-select">Burcunuzu Seçin</label>
            <select id="hc-grub-burc-select">
                <option value="koc">Koç</option>
                <option value="boga">Boğa</option>
                <option value="ikizler">İkizler</option>
                <option value="yengec">Yengeç</option>
                <option value="aslan">Aslan</option>
                <option value="basak">Başak</option>
                <option value="terazi">Terazi</option>
                <option value="akrep">Akrep</option>
                <option value="yay">Yay</option>
                <option value="oglak">Oğlak</option>
                <option value="kova">Kova</option>
                <option value="balik">Balık</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBurcGrubuHesapla()">Grubu Bul</button>
        <div class="hc-result" id="hc-burc-grubu-result">
            <div class="hc-result-label">Burcunuzun Grubu:</div>
            <div class="hc-result-value" id="hc-grub-value"></div>
            <div class="hc-result-desc" id="hc-grub-desc"></div>
        </div>
    </div>
    <?php
}
