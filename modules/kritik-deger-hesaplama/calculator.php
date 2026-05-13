<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kritik_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kritik-deger-hesaplama',
        HC_PLUGIN_URL . 'modules/kritik-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kritik-deger-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kritik-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kritik-deger">
        <h3>Kritik Değer (Z ve T) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-crit-alpha">Anlamlılık Düzeyi (Alpha - α):</label>
            <select id="hc-crit-alpha" class="hc-input">
                <option value="0.10">0.10 (%90 Güven)</option>
                <option value="0.05" selected>0.05 (%95 Güven)</option>
                <option value="0.01">0.01 (%99 Güven)</option>
                <option value="0.005">0.005 (%99.5 Güven)</option>
                <option value="0.001">0.001 (%99.9 Güven)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-crit-df">Serbestlik Derecesi (df) (T testi için):</label>
            <input type="number" id="hc-crit-df" class="hc-input" placeholder="Örn: 20" value="20">
        </div>
        <div class="hc-form-group">
            <label>Test Tipi:</label>
            <div style="display: flex; gap: 20px; margin-top: 5px;">
                <label><input type="radio" name="hc-crit-tails" value="1"> Tek Kuyruklu</label>
                <label><input type="radio" name="hc-crit-tails" value="2" checked> Çift Kuyruklu</label>
            </div>
        </div>
        <button class="hc-btn" onclick="hcKritikDegerHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kritik-deger-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Z Kritik Değeri:</span>
                    <strong id="hc-res-crit-z">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>T Kritik Değeri:</span>
                    <strong id="hc-res-crit-t">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
