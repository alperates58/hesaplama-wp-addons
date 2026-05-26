<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mining_elektrik_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mining-elektrik-maliyeti',
        HC_PLUGIN_URL . 'modules/mining-elektrik-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mining-elektrik-maliyeti-css',
        HC_PLUGIN_URL . 'modules/mining-elektrik-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mining-elektrik-maliyeti-hesaplama">
        <h3>Mining Elektrik Maliyeti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mem-guc">Cihaz Gücü (Watt)</label>
            <input type="number" id="hc-mem-guc" placeholder="Örn: 1200" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mem-saat">Günlük Çalışma Süresi (Saat)</label>
            <input type="number" id="hc-mem-saat" placeholder="Örn: 24" step="any" min="0" max="24" value="24">
        </div>
        <div class="hc-form-group">
            <label for="hc-mem-kWh">Elektrik kWh Tarifesi (₺)</label>
            <input type="number" id="hc-mem-kWh" placeholder="Örn: 2.80" step="any" min="0" value="2.80">
        </div>
        <button class="hc-btn" onclick="hcMiningElektrikMaliyetiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mem-result">
            <h4>Elektrik Tüketim Raporu:</h4>
            <table>
                <thead>
                    <tr>
                        <th>Dönem</th>
                        <th>Tüketim (kWh)</th>
                        <th>Elektrik Maliyeti (₺)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Günlük</td>
                        <td id="hc-mem-res-gun-kwh">0.00</td>
                        <td id="hc-mem-res-gun-tutar" style="font-weight:bold; color:var(--hc-front-red);">0.00</td>
                    </tr>
                    <tr>
                        <td>Aylık (30 Gün)</td>
                        <td id="hc-mem-res-ay-kwh">0.00</td>
                        <td id="hc-mem-res-ay-tutar" style="font-weight:bold; color:var(--hc-front-red);">0.00</td>
                    </tr>
                    <tr>
                        <td>Yıllık (365 Gün)</td>
                        <td id="hc-mem-res-yil-kwh">0.00</td>
                        <td id="hc-mem-res-yil-tutar" style="font-weight:bold; color:var(--hc-front-red);">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}