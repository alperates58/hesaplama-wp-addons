<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_freelance_yillik_gelir_hedefi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-freelance-yillik-gelir',
        HC_PLUGIN_URL . 'modules/freelance-yillik-gelir-hedefi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-freelance-yillik-gelir-css',
        HC_PLUGIN_URL . 'modules/freelance-yillik-gelir-hedefi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-freelance-yillik-gelir-hesaplama">
        <h3>Freelance Yıllık Gelir Hedefi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ygh-hedef">Hedef Yıllık Net Kazanç (₺ veya $)</label>
            <input type="number" id="hc-ygh-hedef" placeholder="Örn: 600000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ygh-gider">Yıllık İş/Ofis Giderleri (Bağkur, kira, muhasebe vb.) (₺ veya $)</label>
            <input type="number" id="hc-ygh-gider" placeholder="Örn: 100000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ygh-hafta">Yılda Kaç Hafta Çalışmak İstiyorsunuz? (Max: 52)</label>
            <input type="number" id="hc-ygh-hafta" placeholder="Örn: 48" step="1" min="1" max="52" value="48">
        </div>
        <div class="hc-form-group">
            <label for="hc-ygh-saat">Haftada Kaç Faturalandırılabilir Saat Çalışabilirsiniz?</label>
            <input type="number" id="hc-ygh-saat" placeholder="Örn: 25" step="any" min="1" max="168" value="25">
        </div>
        <button class="hc-btn" onclick="hcFreelanceYillikGelirHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ygh-result">
            <h4>Hesaplanan Gelir ve Ücret Hedefleri:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Gerekli Brüt Ciro Hedefi (Yıllık)</td>
                        <td id="hc-ygh-res-ciro" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Yıllık Toplam Faturalandırılabilir Saat</td>
                        <td id="hc-ygh-res-toplam-saat" style="font-weight:bold;">0 Saat</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Hedef Saatlik Ücretiniz (Minimum)</td>
                        <td id="hc-ygh-res-saatlik">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}