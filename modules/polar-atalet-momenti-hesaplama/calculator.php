<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_polar_atalet_momenti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-polar-atalet-momenti-hesaplama',
        HC_PLUGIN_URL . 'modules/polar-atalet-momenti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-polar-atalet-momenti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/polar-atalet-momenti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-polar-moment">
        <h3>Polar Atalet Momenti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pm-shape">Kesit Geometrisi</label>
            <select id="hc-pm-shape" onchange="hcPmShapeChange()">
                <option value="solid-round">Dolu Mil (Dairesel)</option>
                <option value="hollow-round">İçi Boş Mil (Boru/Tüp)</option>
                <option value="rectangle">Dolu Dikdörtgen Kesit</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-pm-unit">Ölçü Birimi</label>
            <select id="hc-pm-unit">
                <option value="mm">Milimetre (mm)</option>
                <option value="cm">Santimetre (cm)</option>
                <option value="m">Metre (m)</option>
            </select>
        </div>

        <!-- Dairesel / Dolu Mil için -->
        <div id="hc-pm-solid-round-fields">
            <div class="hc-form-group">
                <label for="hc-pm-d">Mil Çapı (D)</label>
                <input type="number" id="hc-pm-d" placeholder="Örn: 50" value="50">
            </div>
        </div>

        <!-- İçi Boş Mil için -->
        <div id="hc-pm-hollow-round-fields" style="display: none;">
            <div class="hc-form-group">
                <label for="hc-pm-d-out">Dış Çap (D_dış)</label>
                <input type="number" id="hc-pm-d-out" placeholder="Örn: 60" value="60">
            </div>
            <div class="hc-form-group">
                <label for="hc-pm-d-in">İç Çap (d_iç)</label>
                <input type="number" id="hc-pm-d-in" placeholder="Örn: 40" value="40">
            </div>
        </div>

        <!-- Dikdörtgen Kesit için -->
        <div id="hc-pm-rect-fields" style="display: none;">
            <div class="hc-form-group">
                <label for="hc-pm-w">Genişlik (b)</label>
                <input type="number" id="hc-pm-w" placeholder="Örn: 30" value="30">
            </div>
            <div class="hc-form-group">
                <label for="hc-pm-h">Yükseklik (h)</label>
                <input type="number" id="hc-pm-h" placeholder="Örn: 40" value="40">
            </div>
        </div>

        <button class="hc-btn" onclick="hcPolarAtaletMomentiHesapla()">Polar Atalet Momentini Hesapla</button>

        <div class="hc-result" id="hc-polar-atalet-momenti-result">
            <div class="hc-result-label">Polar Atalet Momenti (J / Ip):</div>
            <div class="hc-result-value" id="hc-pm-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Kesit Alanı (A):</strong></td>
                            <td id="hc-pm-area-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Alternatif Birim Karşılığı:</strong></td>
                            <td id="hc-pm-alt-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
