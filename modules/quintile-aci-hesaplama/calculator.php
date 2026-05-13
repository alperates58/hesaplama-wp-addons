<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_quintile_aci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-quintile',
        HC_PLUGIN_URL . 'modules/quintile-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-quintile-css',
        HC_PLUGIN_URL . 'modules/quintile-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-quintile">
        <div class="hc-header">
            <h3>Quintile (72°) Açı Analizi</h3>
            <p>İçinizdeki gizli dehayı ve kimsenin fark etmediği özel yeteneklerinizi keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-qn-p1">1. Gezegen</label>
                <select id="hc-qn-p1" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-qn-p2">2. Gezegen</label>
                <select id="hc-qn-p2" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcQuintileHesapla()">Yetenek Analizini Yap</button>

        <div class="hc-result" id="hc-qn-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Yetenek Teması:</span>
                <span class="hc-result-value" id="hc-qn-value">Yaratıcı Deha</span>
            </div>
            <div class="hc-result-content" id="hc-qn-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
