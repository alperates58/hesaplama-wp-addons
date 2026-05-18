<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rakima_gore_sicaklik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rakima-gore-sicaklik-hesaplama',
        HC_PLUGIN_URL . 'modules/rakima-gore-sicaklik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rakima-gore-sicaklik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/rakima-gore-sicaklik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-alt-temp">
        <h3>Rakıma Göre Sıcaklık Değişimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-at-type">Atmosfer / Hava Durumu</label>
            <select id="hc-at-type">
                <option value="6.5">Standart Atmosfer (Her 100m'de -0.65°C)</option>
                <option value="9.8">Kuru Kararsız Hava (Adyabatik: Her 100m'de -0.98°C)</option>
                <option value="5.0">Nemli Kararlı Hava (Adyabatik: Her 100m'de -0.50°C)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-at-h1">Başlangıç Yüksekliği (m)</label>
            <input type="number" id="hc-at-h1" placeholder="Örn: 0 (Deniz Seviyesi)" value="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-at-t1">Başlangıç Sıcaklığı (°C)</label>
            <input type="number" id="hc-at-t1" placeholder="Örn: 20" value="20" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-at-h2">Hedef Yükseklik / Rakım (m)</label>
            <input type="number" id="hc-at-h2" placeholder="Örn: 1500 (Uludağ Zirve vb.)" value="1500">
        </div>

        <button class="hc-btn" onclick="hcRakımaGöreSıcaklıkHesapla()">Hedef Sıcaklığı Hesapla</button>

        <div class="hc-result" id="hc-rakima-gore-sicaklik-result">
            <div class="hc-result-label">Hedef Yükseklikteki Sıcaklık:</div>
            <div class="hc-result-value" id="hc-at-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Sıcaklık Farkı (&Delta;T):</strong></td>
                            <td id="hc-at-diff-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Açıklama:</strong></td>
                            <td id="hc-at-desc-val" style="font-size: 12px; color: var(--hc-front-muted);">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
