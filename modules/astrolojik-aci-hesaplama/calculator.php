<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_astrolojik_aci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-astrolojik-aci',
        HC_PLUGIN_URL . 'modules/astrolojik-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-astrolojik-aci-css',
        HC_PLUGIN_URL . 'modules/astrolojik-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-astrolojik-aci">
        <h3>Astrolojik Açı Hesaplama</h3>
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>1. Gök Cismi</label>
                <select id="hc-asp-p1" class="hc-input">
                    <option value="Sun">Güneş</option>
                    <option value="Moon">Ay</option>
                    <option value="Mercury">Merkür</option>
                    <option value="Venus">Venüs</option>
                    <option value="Mars">Mars</option>
                    <option value="Jupiter">Jüpiter</option>
                    <option value="Saturn">Satürn</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>2. Gök Cismi</label>
                <select id="hc-asp-p2" class="hc-input">
                    <option value="Moon" selected>Ay</option>
                    <option value="Sun">Güneş</option>
                    <option value="Mercury">Merkür</option>
                    <option value="Venus">Venüs</option>
                    <option value="Mars">Mars</option>
                    <option value="Jupiter">Jüpiter</option>
                    <option value="Saturn">Satürn</option>
                </select>
            </div>
            <div class="hc-form-group" style="grid-column: span 2;">
                <label>Tarih</label>
                <input type="date" id="hc-asp-date" class="hc-input">
            </div>
        </div>
        <button class="hc-btn" onclick="hcAstrolojikAciHesapla()">Açıyı Hesapla</button>
        <div class="hc-result" id="hc-astrolojik-aci-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Açı Değeri</span>
                <div class="hc-result-value" id="hc-asp-value">-</div>
            </div>
            <div id="hc-asp-info" class="hc-asp-info">
                <!-- Açı ismi ve anlamı -->
            </div>
        </div>
    </div>
    <?php
}
