<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_kilosu_persentil( $atts ) {
    wp_enqueue_script(
        'hc-dogum-persentil',
        HC_PLUGIN_URL . 'modules/dogum-kilosu-persentil/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dogum-kilosu-persentil">
        <h3>Doğum Kilosu Persentil Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Ağırlığı (gram)</label>
            <input type="number" id="hc-bw-kilo" placeholder="Örn: 3200">
        </div>
        <div class="hc-form-group">
            <label>Gebelik Haftası</label>
            <input type="number" id="hc-bw-hafta" placeholder="Örn: 40">
        </div>
        <div class="hc-form-group">
            <label>Cinsiyet</label>
            <select id="hc-bw-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kiz">Kız</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDogumPersentilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bw-result">
            <div class="hc-result-value" id="hc-bw-status">-</div>
            <p id="hc-bw-yorum"></p>
        </div>
    </div>
    <?php
}
