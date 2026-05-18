<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ruzgar_duzeltme_acisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ruzgar-duzeltme-acisi-hesaplama',
        HC_PLUGIN_URL . 'modules/ruzgar-duzeltme-acisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ruzgar-duzeltme-acisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ruzgar-duzeltme-acisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wca">
        <h3>Rüzgar Düzeltme Açısı (WCA) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-wca-course">Uçağın İstediği Rota / Yol Açısı (Track - Derece)</label>
            <input type="number" id="hc-wca-course" placeholder="Örn: 90 (Doğu)" value="90" min="0" max="360">
        </div>

        <div class="hc-form-group">
            <label for="hc-wca-tas">Gerçek Hava Hızı (TAS - knots veya km/sa)</label>
            <input type="number" id="hc-wca-tas" placeholder="Örn: 120" value="120">
        </div>

        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 150px;">
                <div class="hc-form-group">
                    <label for="hc-wca-wdir">Rüzgarın Geldiği Yön (Derece)</label>
                    <input type="number" id="hc-wca-wdir" placeholder="Örn: 240" value="240" min="0" max="360">
                </div>
            </div>
            <div style="flex: 1; min-width: 150px;">
                <div class="hc-form-group">
                    <label for="hc-wca-wspeed">Rüzgar Hızı (knots veya km/sa)</label>
                    <input type="number" id="hc-wca-wspeed" placeholder="Örn: 25" value="25">
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcRüzgarDüzeltmeAçısıHesapla()">WCA ve Yer Hızını Hesapla</button>

        <div class="hc-result" id="hc-ruzgar-duzeltme-acisi-result">
            <div class="hc-result-label">Rüzgar Düzeltme Açısı (WCA):</div>
            <div class="hc-result-value" id="hc-wca-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Uçulması Gereken Baş Açısı (Heading):</strong></td>
                            <td id="hc-wca-hdg-val" style="color: var(--hc-primary); font-weight: bold;">-</td>
                        </tr>
                        <tr>
                            <td><strong>Yer Hızı (Ground Speed - GS):</strong></td>
                            <td id="hc-wca-gs-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Yan Rüzgar (Crosswind) Bileşeni:</strong></td>
                            <td id="hc-wca-cross-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Kafa/Kuyruk Rüzgarı (Head/Tailwind):</strong></td>
                            <td id="hc-wca-head-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
