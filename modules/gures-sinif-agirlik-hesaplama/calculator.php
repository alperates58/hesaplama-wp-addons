<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gures_sinif_agirlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wrest-weight',
        HC_PLUGIN_URL . 'modules/gures-sinif-agirlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wrest-weight-css',
        HC_PLUGIN_URL . 'modules/gures-sinif-agirlik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gures-sinif-agirlik-hesaplama">
        <h3>Güreş Sınıf Ağırlık Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gsa-kilo">Mevcut Kilonuz (kg)</label>
            <input type="number" id="hc-gsa-kilo" placeholder="Örn: 74" step="any" min="20">
        </div>
        <div class="hc-form-group">
            <label for="hc-gsa-cins">Cinsiyet</label>
            <select id="hc-gsa-cins">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kadın</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-gsa-yas">Yaş Grubu</label>
            <select id="hc-gsa-yas">
                <option value="u15">U15 (14-15 Yaş)</option>
                <option value="u17">U17 (16-17 Yaş / Yıldızlar)</option>
                <option value="u20">U20 (18-20 Yaş / Gençler)</option>
                <option value="senior" selected>Senior / Büyükler (20+ Yaş)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-gsa-stil">Güreş Stili</label>
            <select id="hc-gsa-stil">
                <option value="serbest">Erkekler Serbest</option>
                <option value="grekoromen">Grekoromen</option>
                <option value="kadin-serbest">Kadınlar Serbest</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcGuresAgirlikHesapla()">Sıklet Analizini Yap</button>
        
        <div class="hc-result" id="hc-gsa-result">
            <h4>Sıklet Analiz Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>En Yakın Alt Sıklet (Kilo Düşme)</td>
                        <td id="hc-gsa-res-alt" style="font-weight:bold;">-</td>
                    </tr>
                    <tr>
                        <td>En Yakın Üst Sıklet (Kilo Alma)</td>
                        <td id="hc-gsa-res-ust" style="font-weight:bold;">-</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Önerilen Yarışma Sıkleti</td>
                        <td id="hc-gsa-res-oneri">-</td>
                    </tr>
                    <tr>
                        <td>Öneri Taktik Detayı</td>
                        <td id="hc-gsa-res-taktik">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}