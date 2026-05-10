<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_et_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-meat-per-person',
        HC_PLUGIN_URL . 'modules/kisi-basina-et-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-meat-pp-calc">
        <h3>Kişi Başına Et Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-meat-count">Kişi Sayısı:</label>
            <input type="number" id="hc-meat-count" placeholder="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-meat-type">Et Türü:</label>
            <select id="hc-meat-type">
                <option value="0.2">Kemiksiz Kırmızı Et (Az Yemekli)</option>
                <option value="0.25">Kırmızı Et (Normal Porsiyon)</option>
                <option value="0.4">Kemikli Et (Pirzola, Kaburga vb.)</option>
                <option value="0.3">Mangal / Barbekü Karışık</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcMeatPPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-meat-pp-result">
            <strong>Toplam İhtiyaç:</strong>
            <div id="hc-meat-total" class="hc-result-value">-</div>
            <p id="hc-meat-info"></p>
        </div>
    </div>
    <?php
}
