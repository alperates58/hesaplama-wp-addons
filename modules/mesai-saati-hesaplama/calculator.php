<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mesai_saati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mesai-saati-hesaplama',
        HC_PLUGIN_URL . 'modules/mesai-saati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mesai-calc">
        <h3>Mesai Saati Hesaplama</h3>
        <div class="hc-form-group">
            <label>Giriş Saati</label>
            <input type="time" id="hc-ms-start" value="08:00">
        </div>
        <div class="hc-form-group">
            <label>Çıkış Saati</label>
            <input type="time" id="hc-ms-end" value="18:30">
        </div>
        <div class="hc-form-group">
            <label>Mola Süresi (Dakika)</label>
            <input type="number" id="hc-ms-break" value="60">
        </div>
        <div class="hc-form-group">
            <label>Günlük Standart Çalışma (Saat)</label>
            <input type="number" id="hc-ms-std" value="9">
        </div>
        <button class="hc-btn" onclick="hcMesaiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ms-result">
            <div class="hc-form-group">
                <label>Toplam Çalışma:</label>
                <div class="hc-result-value" id="hc-ms-total">-</div>
            </div>
            <div class="hc-form-group">
                <label>Fazla Mesai:</label>
                <div class="hc-result-value" id="hc-ms-extra" style="color: #e74c3c;">-</div>
            </div>
        </div>
    </div>
    <?php
}
