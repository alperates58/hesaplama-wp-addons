<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_m_s_hiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-m-s-hiz-hesaplama',
        HC_PLUGIN_URL . 'modules/m-s-hiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-m-s-hiz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/m-s-hiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-m-s-hiz">
        <h3>m/s Hız Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ms-dist">Alınan Mesafe (metre - m)</label>
            <input type="number" id="hc-ms-dist" placeholder="Örn: 100" value="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-ms-time">Geçen Süre (saniye - sn)</label>
            <input type="number" id="hc-ms-time" placeholder="Örn: 9.58 (Usain Bolt)" value="9.58" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcMSHızHesapla()">Hızı Hesapla</button>

        <div class="hc-result" id="hc-m-s-hiz-result">
            <div class="hc-result-label">Ortalama Hız (v):</div>
            <div class="hc-result-value" id="hc-ms-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Kilometre/Saat (km/sa):</strong></td>
                            <td id="hc-ms-kmh-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Mach Hızı Eşdeğeri:</strong></td>
                            <td id="hc-ms-mach-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
