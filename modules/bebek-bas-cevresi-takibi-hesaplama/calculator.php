<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_bas_cevresi_takibi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bebek-bas-takip',
        HC_PLUGIN_URL . 'modules/bebek-bas-cevresi-takibi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bebek-bas-takip">
        <h3>Bebek Baş Çevresi Takibi Hesaplama</h3>
        <div class="hc-form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group">
                <label>Önceki Tarih</label>
                <input type="date" id="hc-bbct-t1">
            </div>
            <div class="hc-form-group">
                <label>Yeni Tarih</label>
                <input type="date" id="hc-bbct-t2" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>
        <div class="hc-form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group">
                <label>Önceki Değer (cm)</label>
                <input type="number" id="hc-bbct-v1" step="0.1">
            </div>
            <div class="hc-form-group">
                <label>Yeni Değer (cm)</label>
                <input type="number" id="hc-bbct-v2" step="0.1">
            </div>
        </div>
        <button class="hc-btn" onclick="hcBebekBasTakipHesapla()">Takip Et</button>
        <div class="hc-result" id="hc-bebek-bas-takip-result">
            <div style="text-align: center;">
                <span style="font-size: 14px; color: var(--hc-front-muted);">Baş Çevresi Artışı</span>
                <div class="hc-result-value" id="hc-res-bbct-fark">+0 cm</div>
            </div>
        </div>
    </div>
    <?php
}
