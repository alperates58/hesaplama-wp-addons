<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pankek_tarifi_olceklendirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pancake-scaling',
        HC_PLUGIN_URL . 'modules/pankek-tarifi-olceklendirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pancake-scaling-calc">
        <h3>Pankek Tarifi Ölçeklendirme</h3>
        <div class="hc-form-group">
            <label for="hc-ps-eggs">Elinizdeki Yumurta Sayısı:</label>
            <input type="number" id="hc-ps-eggs" placeholder="2">
        </div>
        <button class="hc-btn" onclick="hcPancakeScalingHesapla()">Tarifi Hesapla</button>
        <div class="hc-result" id="hc-pancake-scaling-result">
            <strong>Orantılı Malzeme Listesi:</strong>
            <div id="hc-ps-list" style="margin-top:10px;">-</div>
            <p id="hc-ps-info"></p>
        </div>
    </div>
    <?php
}
