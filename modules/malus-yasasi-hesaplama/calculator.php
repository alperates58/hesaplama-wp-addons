<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_malus_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-malus-yasasi-hesaplama',
        HC_PLUGIN_URL . 'modules/malus-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-malus-yasasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/malus-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-malus">
        <h3>Malus Yasası (Işık Polarizasyonu)</h3>
        
        <div class="hc-form-group">
            <label for="hc-malus-i0">Başlangıç Işık Şiddeti (I₀ - W/m² veya lm)</label>
            <input type="number" id="hc-malus-i0" placeholder="Örn: 100" value="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-malus-angle">Filtreler Arası Açı (&theta; - Derece)</label>
            <input type="number" id="hc-malus-angle" placeholder="Örn: 30" value="30">
        </div>

        <button class="hc-btn" onclick="hcMalusYasasıHesapla()">Geçen Işık Şiddetini Hesapla</button>

        <div class="hc-result" id="hc-malus-yasasi-result">
            <div class="hc-result-label">Geçen Işık Şiddeti (I):</div>
            <div class="hc-result-value" id="hc-malus-i-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Geçirgenlik Oranı:</strong></td>
                            <td id="hc-malus-ratio-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Soğurulan (Kayıp) Işık Oranı:</strong></td>
                            <td id="hc-malus-lost-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
