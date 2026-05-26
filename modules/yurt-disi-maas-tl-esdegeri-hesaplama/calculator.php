<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yurt_disi_maas_tl_esdegeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yurt-disi-maas',
        HC_PLUGIN_URL . 'modules/yurt-disi-maas-tl-esdegeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yurt-disi-maas-css',
        HC_PLUGIN_URL . 'modules/yurt-disi-maas-tl-esdegeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yurt-disi-maas-tl-esdegeri-hesaplama">
        <h3>Yurt Dışı Maaş TL Eşdeğeri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ydm-maas">Yabancı Maaş Tutarı (Aylık)</label>
            <input type="number" id="hc-ydm-maas" placeholder="Örn: 4000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ydm-birim">Para Birimi</label>
            <select id="hc-ydm-birim">
                <option value="USD">ABD Doları ($)</option>
                <option value="EUR">Euro (€)</option>
                <option value="GBP">İngiliz Sterlini (£)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ydm-kur">Seçilen Birimin TL Kuru</label>
            <input type="number" id="hc-ydm-kur" placeholder="Örn: 33.50" step="any" min="0.1" value="33.50">
        </div>
        <div class="hc-form-group">
            <label for="hc-ydm-vergi">Vergi Oranı Projeksiyonu (%)</label>
            <input type="number" id="hc-ydm-vergi" placeholder="Örn: 20" step="any" min="0" max="100" value="20">
        </div>
        <div class="hc-form-group">
            <label for="hc-ydm-komisyon">Banka / Transfer Komisyonu (%)</label>
            <input type="number" id="hc-ydm-komisyon" placeholder="Örn: 1" step="any" min="0" max="10" value="0.5">
        </div>
        <button class="hc-btn" onclick="hcYurtDisiMaasHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ydm-result">
            <h4>TL Karşılığı ve Kesinti Dağılımı (Aylık):</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Brüt Nominal Karşılık</td>
                        <td id="hc-ydm-res-brut" style="font-weight:bold;">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Tahmini Vergi Kesintisi</td>
                        <td id="hc-ydm-res-vergi" style="font-weight:bold; color:var(--hc-front-red);">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Transfer / Çevrim Kaybı</td>
                        <td id="hc-ydm-res-komisyon" style="font-weight:bold; color:var(--hc-front-red);">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Elinize Geçecek Net TL Tutar</td>
                        <td id="hc-ydm-res-net">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}