<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sirke_asitlik_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vinegar-acid',
        HC_PLUGIN_URL . 'modules/sirke-asitlik-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vinegar-acid-css',
        HC_PLUGIN_URL . 'modules/sirke-asitlik-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sirke-asitlik-orani-hesaplama">
        <h3>Sirke Asitlik Oranı Hesaplama</h3>
        <p style="font-size:13px; color:#666; margin-bottom:15px;">Sirke asitlik titrasyon test sonuçlarını giriniz (0.1M NaOH çözeltisi baz alınmıştır):</p>
        
        <div class="hc-form-group">
            <label for="hc-sih-numune">Kullanılan Sirke Numunesi Hacmi (ml)</label>
            <input type="number" id="hc-sih-numune" value="10" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-sih-naoh">Kullanılan NaOH Çözeltisi Hacmi (Bürette Sarf Edilen - ml)</label>
            <input type="number" id="hc-sih-naoh" placeholder="Örn: 8.3" step="any" min="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-sih-molar">NaOH Çözeltisi Konsantrasyonu (Molarite - M)</label>
            <input type="number" id="hc-sih-molar" value="0.1" step="0.01" min="0.01">
        </div>
        <button class="hc-btn" onclick="hcSirkeAsitlikHesapla()">Asitliği Hesapla</button>
        
        <div class="hc-result" id="hc-sih-result">
            <h4>Asitlik Yüzdesi Sonucu:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Asetik Asit Oranı</td>
                        <td id="hc-sih-res-asit">%0.00</td>
                    </tr>
                    <tr>
                        <td>Sirke Kalite Sınıfı</td>
                        <td id="hc-sih-res-kalite">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}