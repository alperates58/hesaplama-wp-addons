<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_freelance_vergi_sonrasi_net_gelir_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-freelance-vergi-net',
        HC_PLUGIN_URL . 'modules/freelance-vergi-sonrasi-net-gelir-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-freelance-vergi-net-css',
        HC_PLUGIN_URL . 'modules/freelance-vergi-sonrasi-net-gelir-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-freelance-vergi-net-hesaplama">
        <h3>Freelance Vergi Sonrası Net Gelir Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fvn-ciro">Yıllık Brüt Ciro (₺)</label>
            <input type="number" id="hc-fvn-ciro" placeholder="Örn: 800000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-fvn-gider">Yıllık Düşülebilir Giderler (₺)</label>
            <input type="number" id="hc-fvn-gider" placeholder="Örn: 150000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-fvn-bagkur">Aylık Bağkur / Sigorta Primi (₺)</label>
            <input type="number" id="hc-fvn-bagkur" placeholder="Örn: 6900" step="any" min="0" value="6900">
        </div>
        <div class="hc-form-group">
            <label for="hc-fvn-genc">Genç Girişimci İstisnasından Yararlanıyor musunuz? (29 yaş altı)</label>
            <select id="hc-fvn-genc">
                <option value="hayir" selected>Hayır</option>
                <option value="evet">Evet (230.000 ₺ Vergi Muafiyeti)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcFreelanceVergiNetHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fvn-result">
            <h4>Yıllık Net Finansal Rapor:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Vergi Öncesi Ticari Kazanç</td>
                        <td id="hc-fvn-res-ticari" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Yıllık Sigorta Primi Toplamı</td>
                        <td id="hc-fvn-res-sigorta" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Hesaplanan Yıllık Gelir Vergisi</td>
                        <td id="hc-fvn-res-vergi" style="font-weight:bold; color:var(--hc-front-red);">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Vergi ve Prim Sonrası Yıllık Net Gelir</td>
                        <td id="hc-fvn-res-net">0.00</td>
                    </tr>
                    <tr style="font-size:14px; color:#475569;">
                        <td>Aylık Ortalama Net Gelir</td>
                        <td id="hc-fvn-res-aylik-net" style="font-weight:bold;">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}