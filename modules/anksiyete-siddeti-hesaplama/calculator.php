<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_anksiyete_siddeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gad7-scale',
        HC_PLUGIN_URL . 'modules/anksiyete-siddeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gad7-scale-css',
        HC_PLUGIN_URL . 'modules/anksiyete-siddeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-anksiyete-siddeti-hesaplama">
        <h3>Anksiyete Şiddeti Hesaplama (GAD-7)</h3>
        <p style="font-size:13px; color:#666; margin-bottom:15px;">Son iki hafta içinde aşağıdaki belirtilerden ne sıklıkla şikayetçi oldunuz?</p>
        
        <div class="hc-form-group">
            <label>1. Kendimi sinirli, endişeli veya çok gergin hissetme:</label>
            <select class="hc-gad-q">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Birkaç gün (1)</option>
                <option value="2" selected>Günlerin yarısından fazlasında (2)</option>
                <option value="3">Neredeyse her gün (3)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>2. Kaygılanmayı (endişelenmeyi) durduramama veya kontrol edememe:</label>
            <select class="hc-gad-q">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Birkaç gün (1)</option>
                <option value="2" selected>Günlerin yarısından fazlasında (2)</option>
                <option value="3">Neredeyse her gün (3)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>3. Farklı konular hakkında aşırı derecede endişelenme:</label>
            <select class="hc-gad-q">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Birkaç gün (1)</option>
                <option value="2" selected>Günlerin yarısından fazlasında (2)</option>
                <option value="3">Neredeyse her gün (3)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>4. Gevşeyip rahatlamada zorluk çekme:</label>
            <select class="hc-gad-q">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Birkaç gün (1)</option>
                <option value="2" selected>Günlerin yarısından fazlasında (2)</option>
                <option value="3">Neredeyse her gün (3)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>5. Huzursuzluktan dolayı yerinde duramama:</label>
            <select class="hc-gad-q">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Birkaç gün (1)</option>
                <option value="2" selected>Günlerin yarısından fazlasında (2)</option>
                <option value="3">Neredeyse her gün (3)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcAnksiyeteHesapla()">Şiddet Analizini Başlat</button>
        
        <div class="hc-result" id="hc-gad-result">
            <h4>Anksiyete Seviyesi Değerlendirmesi:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam GAD-7 Puanı</td>
                        <td id="hc-gad-res-skor">0 / 15</td>
                    </tr>
                    <tr>
                        <td>Şiddet Kategorisi</td>
                        <td id="hc-gad-res-durum" style="font-weight:bold;">Orta Derece Anksiyete</td>
                    </tr>
                    <tr>
                        <td>Bilgilendirme Notu</td>
                        <td id="hc-gad-res-not">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}