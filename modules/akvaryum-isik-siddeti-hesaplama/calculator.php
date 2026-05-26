<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akvaryum_isik_siddeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-akvaryum-isik',
        HC_PLUGIN_URL . 'modules/akvaryum-isik-siddeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-akvaryum-isik-css',
        HC_PLUGIN_URL . 'modules/akvaryum-isik-siddeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-akvaryum-isik-siddeti-hesaplama">
        <h3>Akvaryum Işık Şiddeti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ais-hacim">Akvaryum Hacmi (Litre)</label>
            <input type="number" id="hc-ais-hacim" placeholder="Örn: 100" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ais-bitki">Bitki Türü ve Işık Gereksinimi</label>
            <select id="hc-ais-bitki">
                <option value="dusuk">Düşük (Low-Tech: Anubias, Java Fern vb.)</option>
                <option value="orta">Orta (Gül, Limon, Moss Türleri vb.)</option>
                <option value="yuksek">Yüksek (High-Tech: Zemin bitkileri, kırmızı bitkiler vb.)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcIsikHesapla()">Aydınlatma İhtiyacını Hesapla</button>
        <div class="hc-result" id="hc-ais-result">
            <h4>Önerilen Aydınlatma Değerleri:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>LED Aydınlatma Gücü (Lümen)</td>
                        <td id="hc-ais-res-led">0 Lümen</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Floresan T5/T8 Gücü (Watt)</td>
                        <td id="hc-ais-res-floresan">0 Watt</td>
                    </tr>
                    <tr style="font-size:13px; color:#64748b;">
                        <td>Litre Başına LED Gücü</td>
                        <td id="hc-ais-res-led-lt">0 lm/L</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}