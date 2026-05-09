<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_civata_torku_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-civata-torku-hesaplama',
        HC_PLUGIN_URL . 'modules/civata-torku-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-civata-torku-hesaplama-css',
        HC_PLUGIN_URL . 'modules/civata-torku-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-civata-torku-hesaplama">
        <h3>Civata Torku Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ct-diam">Civata Çapı (mm)</label>
            <select id="hc-ct-diam">
                <option value="6">M6</option>
                <option value="8">M8</option>
                <option value="10">M10</option>
                <option value="12">M12</option>
                <option value="14">M14</option>
                <option value="16">M16</option>
                <option value="20">M20</option>
                <option value="24">M24</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ct-grade">Civata Kalite Sınıfı</label>
            <select id="hc-ct-grade">
                <option value="4.6">4.6</option>
                <option value="8.8">8.8 (Standart)</option>
                <option value="10.9">10.9</option>
                <option value="12.9">12.9</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ct-lub">Yağlama Durumu (K Katsayısı)</label>
            <select id="hc-ct-lub">
                <option value="0.20">Kuru / Kaplamasız (0.20)</option>
                <option value="0.15">Yağlanmış (0.15)</option>
                <option value="0.10">Çinko Kaplı / PTFE (0.10)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCTHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ct-result">
            <div class="hc-result-label">Önerilen Sıkma Torku:</div>
            <div class="hc-result-value" id="hc-ct-val">-</div>
            <div class="hc-result-note">T = K * D * P formülü ve %75 gerilme sınırı baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
