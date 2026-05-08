<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_muayene_tarihi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-muayene-calc',
        HC_PLUGIN_URL . 'modules/muayene-tarihi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mth-box">
        <h3>Muayene Tarihi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Araç Cinsi</label>
            <select id="hc-mth-type">
                <option value="2">Hususi Otomobil (2 Yılda Bir)</option>
                <option value="1">Ticari Araç (Kamyonet, Taksi vb. - Her Yıl)</option>
                <option value="3">Sıfır Hususi Araç (İlk 3 Yıl Sonra)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Son Muayene Tarihi (veya Tescil Tarihi)</label>
            <input type="date" id="hc-mth-last-date">
        </div>
        <button class="hc-btn" onclick="hcMthHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mth-result">
            <div class="hc-result-title">Sonraki Muayene Tarihi:</div>
            <div class="hc-result-value" id="hc-mth-val">-</div>
        </div>
    </div>
    <?php
}
