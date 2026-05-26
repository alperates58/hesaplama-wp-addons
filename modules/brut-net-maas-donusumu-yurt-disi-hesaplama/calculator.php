<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_brut_net_maas_donusumu_yurt_disi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-brut-net-yurt-disi',
        HC_PLUGIN_URL . 'modules/brut-net-maas-donusumu-yurt-disi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-brut-net-yurt-disi-css',
        HC_PLUGIN_URL . 'modules/brut-net-maas-donusumu-yurt-disi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-brut-net-maas-donusumu-yurt-disi-hesaplama">
        <h3>Brüt Net Maaş Dönüşümü Yurt Dışı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bnm-brut">Yıllık Brüt Maaş</label>
            <input type="number" id="hc-bnm-brut" placeholder="Örn: 80000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-bnm-ulke">Hedef Ülke Vergi Sistemi</label>
            <select id="hc-bnm-ulke">
                <option value="usa" selected>Amerika Birleşik Devletleri (Ortalama %25 Kesinti)</option>
                <option value="deu">Almanya (Bekar, Class I - Ortalama %42 Kesinti)</option>
                <option value="gbr">İngiltere (Ortalama %30 Kesinti)</option>
                <option value="nld">Hollanda (Ortalama %35 Kesinti)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBrutNetYurtDisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bnm-result">
            <h4>Vergi Sonrası Yıllık Net Maaş Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Yıllık Brüt Maaş</td>
                        <td id="hc-bnm-res-brut" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Tahmini Toplam Vergi ve Prim Kesintisi</td>
                        <td id="hc-bnm-res-kesinti" style="font-weight:bold; color:var(--hc-front-red);">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Yıllık Net Maaş</td>
                        <td id="hc-bnm-res-net-yil">0.00</td>
                    </tr>
                    <tr style="font-size:14px; font-weight:bold;">
                        <td>Aylık Net Maaş (Eşdeğer)</td>
                        <td id="hc-bnm-res-net-ay">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}