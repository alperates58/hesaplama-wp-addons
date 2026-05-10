<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ziyafet_yemek_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-banquet-calc',
        HC_PLUGIN_URL . 'modules/ziyafet-yemek-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-banquet-calc-wrapper">
        <h3>Ziyafet ve Davet Planlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-bq-guests">Davetli Sayısı:</label>
            <input type="number" id="hc-bq-guests" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcBanquetCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-banquet-result">
            <strong>Gereken Toplam Miktarlar:</strong>
            <div id="hc-bq-res-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
