<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_kilo_takibi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bebek-kilo-takip',
        HC_PLUGIN_URL . 'modules/bebek-kilo-takibi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bebek-kilo-takip">
        <h3>Bebek Kilo Takibi Hesaplama</h3>
        <div class="hc-form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group">
                <label>Önceki Ölçüm Tarihi</label>
                <input type="date" id="hc-bkt-t1">
            </div>
            <div class="hc-form-group">
                <label>Yeni Ölçüm Tarihi</label>
                <input type="date" id="hc-bkt-t2" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>
        <div class="hc-form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group">
                <label>Önceki Kilo (kg)</label>
                <input type="number" id="hc-bkt-v1" step="0.01">
            </div>
            <div class="hc-form-group">
                <label>Yeni Kilo (kg)</label>
                <input type="number" id="hc-bkt-v2" step="0.01">
            </div>
        </div>
        <button class="hc-btn" onclick="hcBebekKiloTakipHesapla()">Takip Et</button>
        <div class="hc-result" id="hc-bebek-kilo-takip-result">
            <div style="text-align: center;">
                <span style="font-size: 14px; color: var(--hc-front-muted);">Toplam Kilo Artışı</span>
                <div class="hc-result-value" id="hc-res-bkt-fark">+0 kg</div>
            </div>
            <div style="margin-top: 10px; text-align: center;">
                Günlük Ortalama: <strong id="hc-res-bkt-gun">0 gr</strong>
            </div>
        </div>
    </div>
    <?php
}
