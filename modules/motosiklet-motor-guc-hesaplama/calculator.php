<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motosiklet_motor_guc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-moto-power',
        HC_PLUGIN_URL . 'modules/motosiklet-motor-guc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-moto-power-css',
        HC_PLUGIN_URL . 'modules/motosiklet-motor-guc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-motosiklet-motor-guc-hesaplama">
        <h3>Motosiklet Motor Güç Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mmg-bore">Silindir Çapı - Bore (mm)</label>
            <input type="number" id="hc-mmg-bore" placeholder="Örn: 58" step="any" min="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-mmg-stroke">Strok - Stroke (mm)</label>
            <input type="number" id="hc-mmg-stroke" placeholder="Örn: 47.2" step="any" min="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-mmg-cyl">Silindir Sayısı</label>
            <select id="hc-mmg-cyl">
                <option value="1">Tek Silindir (1)</option>
                <option value="2">Çift Silindir (2)</option>
                <option value="3">3 Silindir (3)</option>
                <option value="4">4 Silindir (4)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-mmg-tork">Motor Torku (Nm)</label>
            <input type="number" id="hc-mmg-tork" placeholder="Örn: 10" step="any" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-mmg-devir">Torkun Verildiği Devir (RPM)</label>
            <input type="number" id="hc-mmg-devir" placeholder="Örn: 7000" min="500">
        </div>
        <button class="hc-btn" onclick="hcMotoGucHesapla()">Motor Hacmi & Gücü Hesapla</button>
        
        <div class="hc-result" id="hc-mmg-result">
            <h4>Hesaplama Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Motor Silindir Hacmi</td>
                        <td id="hc-mmg-res-cc" style="font-weight:bold;">0.0 cc</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Hesaplanan Motor Gücü</td>
                        <td id="hc-mmg-res-hp">0.00 HP (Beygir)</td>
                    </tr>
                    <tr>
                        <td>kW Karşılığı</td>
                        <td id="hc-mmg-res-kw">0.00 kW</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}