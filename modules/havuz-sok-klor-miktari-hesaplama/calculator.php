<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_havuz_sok_klor_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-havuz-sok-klor-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/havuz-sok-klor-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-havuz-sok-klor-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/havuz-sok-klor-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pool-shock">
        <h3>Havuz Şok Klor Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pc-vol">Havuz Hacmi (m³)</label>
            <input type="number" id="hc-pc-vol" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-type">Klor Tipi</label>
            <select id="hc-pc-type">
                <option value="0.65">Kalsiyum Hipoklorit (%65)</option>
                <option value="0.56">Sodyum Diklor (%56)</option>
                <option value="0.12">Sıvı Klor (%12)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcHavuzŞokKlorMiktarıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pc-result">
            <div class="hc-result-label">Gereken Şok Klor:</div>
            <div class="hc-result-value" id="hc-pc-val">-</div>
            <p style="font-size:0.85em; margin-top:10px; color:#666;">*10 ppm şoklama hedefi baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
