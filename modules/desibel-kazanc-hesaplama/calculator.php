<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_desibel_kazanc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-desibel-kazanc-hesaplama',
        HC_PLUGIN_URL . 'modules/desibel-kazanc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-desibel-kazanc-hesaplama-css',
        HC_PLUGIN_URL . 'modules/desibel-kazanc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-desibel-kazanc-hesaplama">
        <h3>Desibel Kazanç Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dk-type">Kazanç Tipi</label>
            <select id="hc-dk-calc-type">
                <option value="power">Güç Kazancı (Pout / Pin)</option>
                <option value="voltage">Gerilim Kazancı (Vout / Vin)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-dk-in">Giriş Değeri (In)</label>
            <input type="number" id="hc-dk-in" placeholder="Örn: 1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dk-out">Çıkış Değeri (Out)</label>
            <input type="number" id="hc-dk-out" placeholder="Örn: 100" step="any">
        </div>
        <button class="hc-btn" onclick="hcDKHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dk-result">
            <div class="hc-result-label">Toplam Kazanç:</div>
            <div class="hc-result-value" id="hc-dk-val">-</div>
            <div class="hc-result-note">Gain (dB) = N * log₁₀(Out / In)</div>
        </div>
    </div>
    <?php
}
