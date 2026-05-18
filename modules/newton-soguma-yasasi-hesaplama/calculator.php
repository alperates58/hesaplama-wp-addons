<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_newton_soguma_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-newton-soguma-yasasi-hesaplama',
        HC_PLUGIN_URL . 'modules/newton-soguma-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-newton-soguma-yasasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/newton-soguma-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cooling">
        <h3>Newton Soğuma Yasası Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cool-t0">Cismin Başlangıç Sıcaklığı (T₀ - °C)</label>
            <input type="number" id="hc-cool-t0" placeholder="Örn: 90 (Sıcak Çay)" value="90">
        </div>

        <div class="hc-form-group">
            <label for="hc-cool-ts">Çevre/Ortam Sıcaklığı (Ts - °C)</label>
            <input type="number" id="hc-cool-ts" placeholder="Örn: 20 (Oda sıcaklığı)" value="20">
        </div>

        <div class="hc-form-group">
            <label for="hc-cool-k">Soğuma Sabiti (k - 1/dakika)</label>
            <input type="number" id="hc-cool-k" placeholder="Örn: 0.05" value="0.05" step="0.001">
            <span style="font-size: 11px; color: var(--hc-front-muted);">Büyük değerler daha hızlı soğumayı belirtir.</span>
        </div>

        <div class="hc-form-group">
            <label for="hc-cool-t">Geçen Süre (t - dakika)</label>
            <input type="number" id="hc-cool-t" placeholder="Örn: 15" value="15">
        </div>

        <button class="hc-btn" onclick="hcNewtonSoğumaYasasıHesapla()">Son Sıcaklığı Hesapla</button>

        <div class="hc-result" id="hc-newton-soguma-yasasi-result">
            <div class="hc-result-label">Cismin Son Sıcaklığı (T(t)):</div>
            <div class="hc-result-value" id="hc-cool-val">-</div>
            
            <div style="margin-top: 15px;">
                <h4 style="margin: 0 0 10px 0;">Zamanla Sıcaklık Değişim Tablosu</h4>
                <table class="hc-result-table">
                    <thead>
                        <tr>
                            <th>Süre (Dakika)</th>
                            <th>Sıcaklık (°C)</th>
                            <th>Değişim Oranı</th>
                        </tr>
                    </thead>
                    <tbody id="hc-cool-table-body">
                        <!-- Dinamik doldurulacak -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
