<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sarkac_periyodu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sarkac-periyodu-hesaplama',
        HC_PLUGIN_URL . 'modules/sarkac-periyodu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sarkac-periyodu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/sarkac-periyodu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pend-period">
        <h3>Sarkaç Periyodu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pp-length">Sarkaç İp Uzunluğu (L - cm)</label>
            <input type="number" id="hc-pp-length" placeholder="Örn: 100" value="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-pp-angle">Başlangıç Salınım Açısı (&theta;₀ - Derece)</label>
            <input type="number" id="hc-pp-angle" placeholder="Küçük Açılar: < 15°" value="5" min="0" max="89">
            <span style="font-size: 11px; color: var(--hc-front-muted);">Açı büyükse hassas düzeltme formülü uygulanır.</span>
        </div>

        <div class="hc-form-group">
            <label for="hc-pp-planet">Bulunulan Gök Cismi (Yerçekimi)</label>
            <select id="hc-pp-planet">
                <option value="9.80665">Dünya (g = 9.81 m/s²)</option>
                <option value="1.62">Ay (g = 1.62 m/s²)</option>
                <option value="3.71">Mars (g = 3.71 m/s²)</option>
                <option value="24.79">Jüpiter (g = 24.79 m/s²)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSarkaçPeriyoduHesapla()">Sarkaç Periyodunu Hesapla</button>

        <div class="hc-result" id="hc-sarkac-periyodu-result">
            <div class="hc-result-label">Salınım Periyodu (T):</div>
            <div class="hc-result-value" id="hc-pp-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Teorik Küçük Açı Periyodu (T₀):</strong></td>
                            <td id="hc-pp-theo-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Sarkaç Frekansı (f):</strong></td>
                            <td id="hc-pp-freq-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
