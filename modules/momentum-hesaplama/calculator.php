<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_momentum_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-momentum-hesaplama',
        HC_PLUGIN_URL . 'modules/momentum-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-momentum-hesaplama-css',
        HC_PLUGIN_URL . 'modules/momentum-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-momentum">
        <h3>Momentum Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mom-mass">Cismin Kütlesi (m - kg)</label>
            <input type="number" id="hc-mom-mass" placeholder="Örn: 80" value="80">
        </div>

        <div class="hc-form-group">
            <label for="hc-mom-v">Cismin Hızı</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-mom-v" placeholder="Örn: 10" value="10" style="flex: 2;">
                <select id="hc-mom-v-unit" style="flex: 1;">
                    <option value="ms">m/s (Metre/Saniye)</option>
                    <option value="kms">km/sa (Kilometre/Saat)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcMomentumHesapla()">Momentumu Hesapla</button>

        <div class="hc-result" id="hc-momentum-result">
            <div class="hc-result-label">Çizgisel Momentum (p):</div>
            <div class="hc-result-value" id="hc-mom-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Cismin Kinetik Enerjisi:</strong></td>
                            <td id="hc-mom-ke-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>De Broglie Dalga Boyu (Tahmini):</strong></td>
                            <td id="hc-mom-debroglie-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
