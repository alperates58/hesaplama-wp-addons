<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yilin_kacinci_gunu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yilin-kacinci-gunu',
        HC_PLUGIN_URL . 'modules/yilin-kacinci-gunu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ykg-calc">
        <h3>Yılın Kaçıncı Günü Hesaplama</h3>
        <div class="hc-form-group">
            <label>Tarih Seçin</label>
            <input type="date" id="hc-ykg-date" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcYilinGunuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ykg-result">
            <div class="hc-form-group">
                <label>Gün Numarası:</label>
                <div class="hc-result-value" id="hc-ykg-val">-</div>
            </div>
            <div class="hc-form-group">
                <label>Yılın Bitmesine:</label>
                <div class="hc-result-value" id="hc-ykg-remain" style="font-size: 20px;">-</div>
            </div>
        </div>
    </div>
    <?php
}
