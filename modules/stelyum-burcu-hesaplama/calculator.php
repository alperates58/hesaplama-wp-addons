<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stelyum_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stelyum',
        HC_PLUGIN_URL . 'modules/stelyum-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stelyum-css',
        HC_PLUGIN_URL . 'modules/stelyum-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stelyum">
        <div class="hc-header">
            <h3>Stelyum (Gezegen Kümelenmesi) Analizi</h3>
            <p>Haritanızın 'kalbi' nerede atıyor? Hangi burç hayatınızda bir takıntı veya deha seviyesinde baskın?</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Güneş</label>
                <select class="hc-input hc-st-planet" data-planet="Güneş">
                    <option value="yok">Seçiniz</option>
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Ay</label>
                <select class="hc-input hc-st-planet" data-planet="Ay">
                    <option value="yok">Seçiniz</option>
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Merkür</label>
                <select class="hc-input hc-st-planet" data-planet="Merkür">
                    <option value="yok">Seçiniz</option>
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Venüs</label>
                <select class="hc-input hc-st-planet" data-planet="Venüs">
                    <option value="yok">Seçiniz</option>
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Mars</label>
                <select class="hc-input hc-st-planet" data-planet="Mars">
                    <option value="yok">Seçiniz</option>
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Jüpiter</label>
                <select class="hc-input hc-st-planet" data-planet="Jüpiter">
                    <option value="yok">Seçiniz</option>
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Satürn</label>
                <select class="hc-input hc-st-planet" data-planet="Satürn">
                    <option value="yok">Seçiniz</option>
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcStelyumHesapla()">Stelyum Analizini Yap</button>

        <div class="hc-result" id="hc-st-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Stelyum Burcunuz:</span>
                <span class="hc-result-value" id="hc-st-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-st-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
