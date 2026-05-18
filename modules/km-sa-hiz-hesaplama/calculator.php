<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_km_sa_hiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-km-sa-hiz-hesaplama',
        HC_PLUGIN_URL . 'modules/km-sa-hiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-km-sa-hiz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/km-sa-hiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-km-sa-hiz">
        <h3>km/sa Hız Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kms-dist">Alınan Mesafe (Yol)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-kms-dist" placeholder="Örn: 100" value="100" style="flex: 2;">
                <select id="hc-kms-dist-unit" style="flex: 1;">
                    <option value="km">Kilometre (km)</option>
                    <option value="m">Metre (m)</option>
                </select>
            </div>
        </div>

        <div class="hc-form-group">
            <label>Geçen Zaman</label>
            <div style="display: flex; gap: 10px;">
                <div style="flex: 1;">
                    <input type="number" id="hc-kms-hr" placeholder="Saat" value="1" min="0">
                    <span style="font-size: 11px; color: var(--hc-front-muted);">Saat</span>
                </div>
                <div style="flex: 1;">
                    <input type="number" id="hc-kms-min" placeholder="Dakika" value="15" min="0" max="59">
                    <span style="font-size: 11px; color: var(--hc-front-muted);">Dakika</span>
                </div>
                <div style="flex: 1;">
                    <input type="number" id="hc-kms-sec" placeholder="Saniye" value="0" min="0" max="59">
                    <span style="font-size: 11px; color: var(--hc-front-muted);">Saniye</span>
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcKmSaHızHesapla()">Hızı Hesapla</button>

        <div class="hc-result" id="hc-km-sa-hiz-result">
            <div class="hc-result-label">Ortalama Hız:</div>
            <div class="hc-result-value" id="hc-kms-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Metre/Saniye (m/s):</strong></td>
                            <td id="hc-kms-ms-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>100 Metre Koşu Süresi Karşılığı:</strong></td>
                            <td id="hc-kms-100m-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
