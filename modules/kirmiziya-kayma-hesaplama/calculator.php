<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kirmiziya_kayma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kirmiziya-kayma-hesaplama',
        HC_PLUGIN_URL . 'modules/kirmiziya-kayma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kirmiziya-kayma-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kirmiziya-kayma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kirmiziya-kayma">
        <h3>Kırmızıya Kayma ve Hız Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-red-lambda-emit">Yayılan Dalga Boyu (&lambda;<sub>kaynak</sub> - nm)</label>
            <input type="number" id="hc-red-lambda-emit" placeholder="Örn: 656.3 (H-alfa)" value="656.3">
        </div>

        <div class="hc-form-group">
            <label for="hc-red-lambda-obs">Gözlenen Dalga Boyu (&lambda;<sub>gözlenen</sub> - nm)</label>
            <input type="number" id="hc-red-lambda-obs" placeholder="Örn: 680.5" value="680.5">
        </div>

        <button class="hc-btn" onclick="hcKırmızıyaKaymaHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-kirmiziya-kayma-result">
            <div class="hc-result-label">Kırmızıya Kayma Oranı (z):</div>
            <div class="hc-result-value" id="hc-red-z-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Gözlem Tipi:</strong></td>
                            <td id="hc-red-type-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Relativistik Hız (v):</strong></td>
                            <td id="hc-red-v-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Işık Hızına Oranı (v/c):</strong></td>
                            <td id="hc-red-vc-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Hubble Yasasına Göre Yaklaşık Mesafe:</strong></td>
                            <td id="hc-red-dist-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
