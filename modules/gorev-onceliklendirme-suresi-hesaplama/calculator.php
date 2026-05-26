<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gorev_onceliklendirme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-task-prior',
        HC_PLUGIN_URL . 'modules/gorev-onceliklendirme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-task-prior-css',
        HC_PLUGIN_URL . 'modules/gorev-onceliklendirme-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gorev-onceliklendirme-suresi-hesaplama">
        <h3>Görev Önceliklendirme Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-gos-onem">Görevin Önem Derecesi (1 - 10)</label>
            <input type="number" id="hc-gos-onem" value="7" min="1" max="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-gos-aciliyet">Görevin Aciliyet Derecesi (1 - 10)</label>
            <input type="number" id="hc-gos-aciliyet" value="6" min="1" max="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-gos-caba">Görevi Tamamlamak İçin Gerekli Çaba / Süre (1 - 10)</label>
            <input type="number" id="hc-gos-caba" value="4" min="1" max="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-gos-deger">Görevin Sağlayacağı Değer / Katkı (1 - 10)</label>
            <input type="number" id="hc-gos-deger" value="8" min="1" max="10">
        </div>
        <button class="hc-btn" onclick="hcGorevOncelikHesapla()">Öncelik Durumunu Analiz Et</button>
        
        <div class="hc-result" id="hc-gos-result">
            <h4>Öncelik Analiz Sonuçları:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Öncelik Skoru</td>
                        <td id="hc-gos-res-skor">0 / 100</td>
                    </tr>
                    <tr>
                        <td>Eisenhower Matrisi Konumu</td>
                        <td id="hc-gos-res-matris" style="font-weight:bold;">Do First (Hemen Yap)</td>
                    </tr>
                    <tr>
                        <td>Aksiyon Tavsiyesi</td>
                        <td id="hc-gos-res-aksiyon">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}