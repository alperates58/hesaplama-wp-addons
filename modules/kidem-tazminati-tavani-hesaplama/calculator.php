<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kidem_tazminati_tavani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kidem-tazminati-tavani',
        HC_PLUGIN_URL . 'modules/kidem-tazminati-tavani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kidem-tazminati-tavani-css',
        HC_PLUGIN_URL . 'modules/kidem-tazminati-tavani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kidem-tazminati-tavani-hesaplama">
        <h3>Kıdem Tazminatı Tavanı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ktt-brut">Aylık Giydirilmiş Brüt Maaş (₺)</label>
            <input type="number" id="hc-ktt-brut" placeholder="Örn: 75000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ktt-giris">İşe Başlama Tarihi</label>
            <input type="date" id="hc-ktt-giris">
        </div>
        <div class="hc-form-group">
            <label for="hc-ktt-cikis">İşten Ayrılış Tarihi</label>
            <input type="date" id="hc-ktt-cikis">
        </div>
        <button class="hc-btn" onclick="hcKidemTavanHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ktt-result">
            <h4>Kıdem Tazminat Hesabı Detayları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Hizmet Süresi</td>
                        <td id="hc-ktt-res-sure">0 Yıl 0 Ay 0 Gün</td>
                    </tr>
                    <tr>
                        <td>Uygulanan Kıdem Tazminat Tavanı</td>
                        <td id="hc-ktt-res-tavan">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Hesaba Esas Brüt Maaş (Tavan Sınırlı)</td>
                        <td id="hc-ktt-res-esas">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Brüt Kıdem Tazminatı Tutarı</td>
                        <td id="hc-ktt-res-brut-tutar">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Damga Vergisi Kesintisi (Binde 7.59)</td>
                        <td id="hc-ktt-res-vergi" style="color:var(--hc-front-red);">-0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Net Ödenecek Kıdem Tazminatı</td>
                        <td id="hc-ktt-res-net">0 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}