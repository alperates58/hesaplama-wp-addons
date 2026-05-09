<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tarih_ekleme_cikarma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarih-ekleme-cikarma',
        HC_PLUGIN_URL . 'modules/tarih-ekleme-cikarma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tec-calc">
        <h3>Tarih Ekleme Çıkarma Hesaplama</h3>
        <div class="hc-form-group">
            <label>Başlangıç Tarihi</label>
            <input type="date" id="hc-tec-date" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="hc-form-group">
            <label>Süre</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-tec-val" value="10">
                <select id="hc-tec-unit">
                    <option value="days">Gün</option>
                    <option value="weeks">Hafta</option>
                    <option value="months">Ay</option>
                    <option value="years">Yıl</option>
                </select>
            </div>
        </div>
        <div class="hc-form-group">
            <label>İşlem</label>
            <select id="hc-tec-op">
                <option value="add">Ekle (+)</option>
                <option value="sub">Çıkar (-)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTarihEkleCikar()">Hesapla</button>
        <div class="hc-result" id="hc-tec-result">
            <div class="hc-result-title">Sonuç Tarih:</div>
            <div class="hc-result-value" id="hc-tec-res-val">-</div>
        </div>
    </div>
    <?php
}
