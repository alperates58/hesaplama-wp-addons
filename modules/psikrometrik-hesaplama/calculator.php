<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_psikrometrik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-psikrometrik-hesaplama',
        HC_PLUGIN_URL . 'modules/psikrometrik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-psikrometrik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/psikrometrik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-psychrometric">
        <h3>Psikrometrik Hava Analizi</h3>
        
        <div class="hc-form-group">
            <label for="hc-psy-td">Kuru Hazne Sıcaklığı (Td - °C)</label>
            <input type="number" id="hc-psy-td" placeholder="Örn: 25" value="25" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-psy-tw">Islak Hazne Sıcaklığı (Tw - °C)</label>
            <input type="number" id="hc-psy-tw" placeholder="Örn: 18" value="18" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-psy-p">Barometrik Basınç (hPa / mbar)</label>
            <input type="number" id="hc-psy-p" placeholder="Standart: 1013.25" value="1013.25" step="0.1">
        </div>

        <button class="hc-btn" onclick="hcPsikrometrikHesapla()">Psikrometrik Analiz Yap</button>

        <div class="hc-result" id="hc-psikrometrik-result">
            <div class="hc-result-label">Bağıl Nem Seviyesi (RH):</div>
            <div class="hc-result-value" id="hc-psy-rh-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Çiy Noktası (Dew Point):</strong></td>
                            <td id="hc-psy-tdew-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Özgül Nem (Nem Oranı - w):</strong></td>
                            <td id="hc-psy-w-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Havanın Entalpisi (h):</strong></td>
                            <td id="hc-psy-h-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
