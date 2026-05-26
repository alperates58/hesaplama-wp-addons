<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_startup_runway_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-startup-runway',
        HC_PLUGIN_URL . 'modules/startup-runway-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-startup-runway-css',
        HC_PLUGIN_URL . 'modules/startup-runway-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-startup-runway-hesaplama">
        <h3>Startup Runway Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-srw-nakit">Kasadaki Toplam Nakit (₺ veya $)</label>
            <input type="number" id="hc-srw-nakit" placeholder="Örn: 500000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-srw-gelir">Aylık Toplam Gelir (Ciro) (₺ veya $)</label>
            <input type="number" id="hc-srw-gelir" placeholder="Örn: 20000" step="any" min="0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-srw-gider">Aylık Toplam Gider (Maaş, sunucu, ofis vb.) (₺ veya $)</label>
            <input type="number" id="hc-srw-gider" placeholder="Örn: 70000" step="any" min="0">
        </div>
        <button class="hc-btn" onclick="hcStartupRunwayHesapla()">Runway Hesapla</button>
        <div class="hc-result" id="hc-srw-result">
            <h4>Runway Analiz Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Aylık Net Burn Rate (Nakit Erime Hızı)</td>
                        <td id="hc-srw-res-burn" style="font-weight:bold; color:var(--hc-front-red);">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Runway (Ömür)</td>
                        <td id="hc-srw-res-runway">0 Ay</td>
                    </tr>
                    <tr style="font-size:13px; color:#64748b;">
                        <td>Günlük Nakit Tüketimi</td>
                        <td id="hc-srw-res-gunluk">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}