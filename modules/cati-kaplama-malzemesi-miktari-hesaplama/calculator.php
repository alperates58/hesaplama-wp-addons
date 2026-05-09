<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cati_kaplama_malzemesi_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cati-kaplama-malzemesi-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/cati-kaplama-malzemesi-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cati-kaplama-malzemesi-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cati-kaplama-malzemesi-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cati-kaplama-malzemesi-miktari-hesaplama">
        <h3>Çatı Kaplama Malzemesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ckm-area">Çatı Yüzey Alanı (m²)</label>
            <input type="number" id="hc-ckm-area" placeholder="Örn: 150" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ckm-type">Malzeme Tipi</label>
            <select id="hc-ckm-type">
                <option value="15">Kiremit (15 adet/m²)</option>
                <option value="3">Şıngıl (Shingle) (3 m²/paket)</option>
                <option value="1">Sandviç Panel (m² üzerinden)</option>
                <option value="0.7">Onduline (0.7 m²/tabaka)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ckm-waste">Fire Payı (%)</label>
            <input type="number" id="hc-ckm-waste" placeholder="Örn: 10" value="10">
        </div>
        <button class="hc-btn" onclick="hcCKMHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ckm-result">
            <div class="hc-result-label">Gereken Malzeme Miktarı:</div>
            <div class="hc-result-value" id="hc-ckm-val">-</div>
            <div class="hc-result-note">Seçilen malzeme birimine göre yaklaşık miktardır.</div>
        </div>
    </div>
    <?php
}
