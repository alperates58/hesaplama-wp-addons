<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_paralaks_mesafesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-paralaks-mesafesi-hesaplama',
        HC_PLUGIN_URL . 'modules/paralaks-mesafesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-paralaks-mesafesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/paralaks-mesafesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-parallax">
        <h3>Paralaks Mesafesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pl-unit">Açı Birimi</label>
            <select id="hc-pl-unit" onchange="hcPlUnitChange()">
                <option value="arcsec">Yay Saniyesi (arcsecond - ")</option>
                <option value="mas">Mili Yay Saniyesi (mas)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-pl-angle">Paralaks Açısı (p)</label>
            <input type="number" id="hc-pl-angle" placeholder="Örn: 0.768 (Proxima Centauri)" value="0.768" step="0.0001">
            <span style="font-size: 11px; color: var(--hc-front-muted);">Proxima Centauri: 0.768" | Sirius: 0.379"</span>
        </div>

        <button class="hc-btn" onclick="hcParalaksMesafesiHesapla()">Yıldız Mesafesini Hesapla</button>

        <div class="hc-result" id="hc-paralaks-mesafesi-result">
            <div class="hc-result-label">Parsek Cinsinden Mesafe (d):</div>
            <div class="hc-result-value" id="hc-pl-pc-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Işık Yılı (ly):</strong></td>
                            <td id="hc-pl-ly-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Astronomik Birim (AU):</strong></td>
                            <td id="hc-pl-au-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Metre (m):</strong></td>
                            <td id="hc-pl-m-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
