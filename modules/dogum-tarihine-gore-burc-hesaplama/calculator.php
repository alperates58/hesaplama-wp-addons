<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_tarihine_gore_burc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dogum-tarihi-burc',
        HC_PLUGIN_URL . 'modules/dogum-tarihine-gore-burc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dogum-tarihi-burc-css',
        HC_PLUGIN_URL . 'modules/dogum-tarihine-gore-burc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dt-burc">
        <div class="hc-header">
            <h3>Burç Sorgulama</h3>
            <p>Doğduğunuz güne göre güneş burcunuzu ve sizi tanımlayan en belirgin özellikleri keşfedin.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-dt-day">Doğum Günü</label>
            <input type="number" id="hc-dt-day" class="hc-input" min="1" max="31" placeholder="Örn: 15">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-dt-month">Doğum Ayı</label>
            <select id="hc-dt-month" class="hc-input">
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

        <button class="hc-btn" onclick="hcDogumTarihiBurcHesapla()">Burcumu Göster</button>

        <div class="hc-result" id="hc-dt-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Sizin Burcunuz:</span>
                <span class="hc-result-value" id="hc-dt-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-dt-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
