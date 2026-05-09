<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_boy_takibi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bebek-boy-takip',
        HC_PLUGIN_URL . 'modules/bebek-boy-takibi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bebek-boy-takip">
        <h3>Bebek Boy Takibi Hesaplama</h3>
        <div class="hc-form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group">
                <label>Önceki Tarih</label>
                <input type="date" id="hc-bbt-t1">
            </div>
            <div class="hc-form-group">
                <label>Yeni Tarih</label>
                <input type="date" id="hc-bbt-t2" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>
        <div class="hc-form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group">
                <label>Önceki Boy (cm)</label>
                <input type="number" id="hc-bbt-v1" step="0.1">
            </div>
            <div class="hc-form-group">
                <label>Yeni Boy (cm)</label>
                <input type="number" id="hc-bbt-v2" step="0.1">
            </div>
        </div>
        <button class="hc-btn" onclick="hcBebekBoyTakipHesapla()">Takip Et</button>
        <div class="hc-result" id="hc-bebek-boy-takip-result">
            <div style="text-align: center;">
                <span style="font-size: 14px; color: var(--hc-front-muted);">Toplam Boy Uzaması</span>
                <div class="hc-result-value" id="hc-res-bbt-fark">+0 cm</div>
            </div>
        </div>
    </div>
    <?php
}
