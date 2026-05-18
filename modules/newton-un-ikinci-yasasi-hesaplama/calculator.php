<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_newton_un_ikinci_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-newton-un-ikinci-yasasi-hesaplama',
        HC_PLUGIN_URL . 'modules/newton-un-ikinci-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-newton-un-ikinci-yasasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/newton-un-ikinci-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-newton-second">
        <h3>Newton'un İkinci Hareket Yasası (F = m &times; a)</h3>
        
        <div class="hc-form-group">
            <label for="hc-n2-find">Hesaplamak İstediğiniz Değer</label>
            <select id="hc-n2-find" onchange="hcN2FindChange()">
                <option value="F">Net Kuvvet (F)</option>
                <option value="a">İvme (a)</option>
                <option value="m">Kütle (m)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-n2-f-group" style="display: none;">
            <label for="hc-n2-f">Uygulanan Kuvvet (F - Newton)</label>
            <input type="number" id="hc-n2-f" placeholder="Örn: 80" value="80">
        </div>

        <div class="hc-form-group" id="hc-n2-m-group">
            <label for="hc-n2-m">Kütle (m - kg)</label>
            <input type="number" id="hc-n2-m" placeholder="Örn: 10" value="10">
        </div>

        <div class="hc-form-group" id="hc-n2-a-group">
            <label for="hc-n2-a">İvme (a - m/s²)</label>
            <input type="number" id="hc-n2-a" placeholder="Örn: 4" value="4">
        </div>

        <div class="hc-form-group">
            <label for="hc-n2-friction">Yüzey Sürtünme Katsayısı (&mu; - Kinetik)</label>
            <input type="number" id="hc-n2-friction" placeholder="Örn: 0 (Sürtünmesiz)" value="0" step="0.01" min="0" max="1">
            <span style="font-size: 11px; color: var(--hc-front-muted);">Sürtünme varsa net ivmeyi/kuvveti etkiler.</span>
        </div>

        <button class="hc-btn" onclick="hcNewtonUnIkinciYasasıHesapla()">Newton 2. Yasasını Hesapla</button>

        <div class="hc-result" id="hc-newton-un-ikinci-yasasi-result">
            <div class="hc-result-label" id="hc-n2-result-label">Sonuç:</div>
            <div class="hc-result-value" id="hc-n2-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Sürtünme Kuvveti (fs):</strong></td>
                            <td id="hc-n2-fs-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Net Kuvvet (F_net):</strong></td>
                            <td id="hc-n2-fnet-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
