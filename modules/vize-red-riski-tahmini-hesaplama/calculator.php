<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vize_red_riski_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-visa-rejection',
        HC_PLUGIN_URL . 'modules/vize-red-riski-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-visa-rejection-css',
        HC_PLUGIN_URL . 'modules/vize-red-riski-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vize-red-riski-tahmini-hesaplama">
        <h3>Vize Red Riski & Onay Olasılığı Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-vrr-is">Çalışma ve Sosyal Güvence Durumunuz</label>
            <select id="hc-vrr-is">
                <option value="sgk" selected>SGK\'lı Çalışan (Düzenli Bordrolu)</option>
                <option value="owner">İş Yeri Sahibi / Şirket Ortağı</option>
                <option value="freelance">Freelance / Proje Bazlı (SGK\'sız)</option>
                <option value="ogrenci">Öğrenci (Sponsorlu)</option>
                <option value="issiz">Çalışmıyor / İş Arayışında</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-vrr-gelir">Aylık Resmi Belgelenebilir Geliriniz (TL)</label>
            <input type="number" id="hc-vrr-gelir" value="38000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-vrr-banka">Bankada Gösterilebilecek Nakit Bakiye (TL Karşılığı)</label>
            <input type="number" id="hc-vrr-banka" value="150000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-vrr-gecmis">Seyahat & Eski Vize Geçmişiniz</label>
            <select id="hc-vrr-gecmis">
                <option value="active">Aktif Vizem Var (Schengen, ABD vb.)</option>
                <option value="old">Son 3 Yılda Vizem Vardı (Süresi bitti)</option>
                <option value="none" selected>İlk Defa Vize Alacağım / Eski Vizem Yok</option>
                <option value="reject">Daha Önce Vize Reddi Aldım</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcVizeRiskHesapla()">Risk Profil Analizi Yap</button>
        
        <div class="hc-result" id="hc-vrr-result">
            <h4>Vize Değerlendirme Sonuç Kartı:</h4>
            <table>
                <tbody>
                    <tr style="font-size:18px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Vize Onay Olasılığı</td>
                        <td id="hc-vrr-res-onay">%0</td>
                    </tr>
                    <tr>
                        <td>Risk Seviyesi Derecesi</td>
                        <td id="hc-vrr-res-derece" style="font-weight:bold;">Normal</td>
                    </tr>
                    <tr>
                        <td>Başvuruyu Güçlendirici Öneri</td>
                        <td id="hc-vrr-res-tavsiye">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}