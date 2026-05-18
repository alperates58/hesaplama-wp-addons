<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_optik_yogunluk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-optik-yogunluk-hesaplama',
        HC_PLUGIN_URL . 'modules/optik-yogunluk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-optik-yogunluk-hesaplama-css',
        HC_PLUGIN_URL . 'modules/optik-yogunluk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-opt-density">
        <h3>Optik Yoğunluk (Absorbans) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-od-method">Hesaplama Yöntemi</label>
            <select id="hc-od-method" onchange="hcOdMethodChange()">
                <option value="trans">Transmitans (Geçirgenlik) Oranına Göre</option>
                <option value="intensity">Işık Şiddetine Göre (I₀ ve I)</option>
                <option value="beer">Beer-Lambert Yasası (Kimyasal Analiz)</option>
            </select>
        </div>

        <div id="hc-od-trans-group">
            <div class="hc-form-group">
                <label for="hc-od-t">Transmitans (Geçirgenlik) Yüzdesi (% T)</label>
                <input type="number" id="hc-od-t" placeholder="Örn: 50" value="50" min="0.0001" max="100" step="0.01">
                <span style="font-size: 11px; color: var(--hc-front-muted);">%100 geçirgenlik sıfır optik yoğunluk demektir.</span>
            </div>
        </div>

        <div id="hc-od-intensity-group" style="display: none;">
            <div class="hc-form-group">
                <label for="hc-od-i0">Gelen Işık Şiddeti (I₀)</label>
                <input type="number" id="hc-od-i0" placeholder="Örn: 1000" value="1000">
            </div>
            <div class="hc-form-group">
                <label for="hc-od-i">Geçen Işık Şiddeti (I)</label>
                <input type="number" id="hc-od-i" placeholder="Örn: 100" value="100">
            </div>
        </div>

        <div id="hc-od-beer-group" style="display: none;">
            <div class="hc-form-group">
                <label for="hc-od-ext">Molar Absorpsiyon Katsayısı (&epsilon; - L/mol·cm)</label>
                <input type="number" id="hc-od-ext" placeholder="Örn: 15000" value="15000">
            </div>
            <div class="hc-form-group">
                <label for="hc-od-conc">Konsantrasyon (c - mol/L)</label>
                <input type="number" id="hc-od-conc" placeholder="Örn: 0.00002" value="0.00002" step="0.000001">
            </div>
            <div class="hc-form-group">
                <label for="hc-od-path">Işık Yolu Uzunluğu (l - cm)</label>
                <input type="number" id="hc-od-path" placeholder="Örn: 1" value="1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcOptikYoğunlukHesapla()">Optik Yoğunluğu Hesapla</button>

        <div class="hc-result" id="hc-optik-yogunluk-result">
            <div class="hc-result-label">Optik Yoğunluk (Absorbans - OD / A):</div>
            <div class="hc-result-value" id="hc-od-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Işık Geçirgenliği (Transmitans):</strong></td>
                            <td id="hc-od-trans-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Işık Emilimi (Absorpsiyon Oranı):</strong></td>
                            <td id="hc-od-absorb-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
