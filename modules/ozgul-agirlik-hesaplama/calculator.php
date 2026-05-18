<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ozgul_agirlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ozgul-agirlik-hesaplama',
        HC_PLUGIN_URL . 'modules/ozgul-agirlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ozgul-agirlik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ozgul-agirlik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-spec-weight">
        <h3>Özgül Ağırlık Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sw-input-type">Giriş Türü</label>
            <select id="hc-sw-input-type" onchange="hcSwInputTypeChange()">
                <option value="density">Doğrudan Yoğunluk (kg/m³)</option>
                <option value="mass-vol">Kütle (kg) ve Hacim (m³)</option>
            </select>
        </div>

        <div id="hc-sw-density-group">
            <div class="hc-form-group">
                <label for="hc-sw-rho">Maddenin Yoğunluğu (kg/m³)</label>
                <input type="number" id="hc-sw-rho" placeholder="Örn: 7800 (Çelik)" value="7800">
                <span style="font-size: 11px; color: var(--hc-front-muted);">Su: 1000 kg/m³, Altın: 19300 kg/m³</span>
            </div>
        </div>

        <div id="hc-sw-massvol-group" style="display: none;">
            <div class="hc-form-group">
                <label for="hc-sw-mass">Kütle (m - kg)</label>
                <input type="number" id="hc-sw-mass" placeholder="Örn: 50" value="50">
            </div>
            <div class="hc-form-group">
                <label for="hc-sw-vol">Hacim (V - m³)</label>
                <input type="number" id="hc-sw-vol" placeholder="Örn: 0.05" value="0.05">
            </div>
        </div>

        <button class="hc-btn" onclick="hcÖzgülAğırlıkHesapla()">Özgül Ağırlığı Hesapla</button>

        <div class="hc-result" id="hc-ozgul-agirlik-result">
            <div class="hc-result-label">Özgül Ağırlık (&gamma;):</div>
            <div class="hc-result-value" id="hc-sw-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Bağıl Yoğunluk / Özgül Kütle (Suya Göre - SG):</strong></td>
                            <td id="hc-sw-sg-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Maddenin Yoğunluğu (&rho;):</strong></td>
                            <td id="hc-sw-rho-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
