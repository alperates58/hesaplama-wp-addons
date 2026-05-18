<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_momentum_korunumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-momentum-korunumu-hesaplama',
        HC_PLUGIN_URL . 'modules/momentum-korunumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-momentum-korunumu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/momentum-korunumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mom-conserv">
        <h3>Momentum Korunumu ve Çarpışma</h3>
        
        <div class="hc-form-group">
            <label for="hc-mc-type">Çarpışma Türü</label>
            <select id="hc-mc-type">
                <option value="inelastic">Esnek Olmayan Çarpışma (Cisimler Yapışıyor)</option>
                <option value="elastic">Esnek Çarpışma (Cisimler Ayrılıyor)</option>
            </select>
        </div>

        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 200px; border: 1px solid var(--hc-border); padding: 10px; border-radius: 6px;">
                <h4 style="margin: 0 0 10px 0;">1. Cisim</h4>
                <div class="hc-form-group">
                    <label for="hc-mc-m1">Kütle (m₁ - kg)</label>
                    <input type="number" id="hc-mc-m1" placeholder="Örn: 2" value="2">
                </div>
                <div class="hc-form-group">
                    <label for="hc-mc-v1">İlk Hız (v₁i - m/s)</label>
                    <input type="number" id="hc-mc-v1" placeholder="Örn: 5" value="5">
                </div>
            </div>
            
            <div style="flex: 1; min-width: 200px; border: 1px solid var(--hc-border); padding: 10px; border-radius: 6px;">
                <h4 style="margin: 0 0 10px 0;">2. Cisim</h4>
                <div class="hc-form-group">
                    <label for="hc-mc-m2">Kütle (m₂ - kg)</label>
                    <input type="number" id="hc-mc-m2" placeholder="Örn: 3" value="3">
                </div>
                <div class="hc-form-group">
                    <label for="hc-mc-v2">İlk Hız (v₂i - m/s)</label>
                    <input type="number" id="hc-mc-v2" placeholder="Örn: -2" value="-2">
                    <span style="font-size: 11px; color: var(--hc-front-muted);">Ters yön için eksi (-) değer girin.</span>
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcMomentumKorunumuHesapla()" style="margin-top: 15px;">Çarpışmayı Hesapla</button>

        <div class="hc-result" id="hc-momentum-korunumu-result">
            <div class="hc-result-label">Çarpışma Sonrası Hızlar:</div>
            <div class="hc-result-value" id="hc-mc-result-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>İlk Toplam Enerji (Ki):</strong></td>
                            <td id="hc-mc-kei-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Son Toplam Enerji (Kf):</strong></td>
                            <td id="hc-mc-kef-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Kayıp/Dönüşen Enerji (&Delta;K):</strong></td>
                            <td id="hc-mc-kelost-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>İlk Toplam Momentum (Pi):</strong></td>
                            <td id="hc-mc-pi-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
