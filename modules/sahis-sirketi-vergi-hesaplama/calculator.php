<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sahis_sirketi_vergi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sahis-vergi',
        HC_PLUGIN_URL . 'modules/sahis-sirketi-vergi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sahis-vergi-css',
        HC_PLUGIN_URL . 'modules/sahis-sirketi-vergi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sahis-sirketi-vergi-hesaplama">
        <h3>Şahıs Şirketi Vergi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ss-income">Yıllık Toplam Gelir (TL)</label>
            <input type="number" id="hc-ss-income" placeholder="KDV Hariç Ciro">
        </div>

        <div class="hc-form-group">
            <label for="hc-ss-expense">Yıllık Toplam Gider (TL)</label>
            <input type="number" id="hc-ss-expense" placeholder="Vergiden düşülebilir giderler">
        </div>

        <div class="hc-form-group">
            <label for="hc-ss-bagkur">Bağkur Prim Ödemesi</label>
            <select id="hc-ss-bagkur">
                <option value="min">Asgari (33.030 TL üzerinden)</option>
                <option value="none">Ödenmiyor / Diğer</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcSahisVergiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sahis-result">
            <div class="hc-result-item">
                <span>Yıllık Safi Kar:</span>
                <strong id="hc-ss-res-profit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Hesaplanan Gelir Vergisi:</span>
                <strong id="hc-ss-res-tax">-</strong>
            </div>
            <div class="hc-result-value" id="hc-ss-res-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yıllık Net Kazanç (Vergi ve Bağkur Sonrası)</p>
        </div>
    </div>
    <?php
}
