<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stres_yuku_puani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stress-scale',
        HC_PLUGIN_URL . 'modules/stres-yuku-puani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stress-scale-css',
        HC_PLUGIN_URL . 'modules/stres-yuku-puani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stres-yuku-puani-hesaplama">
        <h3>Stres Yükü Puanı Hesaplama</h3>
        <p style="font-size:13px; color:#666; margin-bottom:15px;">Son bir ay içindeki durumunuzu yansıtan seçeneği işaretleyin:</p>
        
        <div class="hc-form-group">
            <label>1. Beklenmedik olaylar yüzünden kendinizi gergin veya aşırı stresli hissetme sıklığınız nedir?</label>
            <select class="hc-stress-q" data-type="direct">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Neredeyse hiç (1)</option>
                <option value="2" selected>Bazen (2)</option>
                <option value="3">Sık sık (3)</option>
                <option value="4">Çok sık (4)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>2. Hayatınızdaki önemli şeyleri kontrol edemediğinizi hissetme sıklığınız nedir?</label>
            <select class="hc-stress-q" data-type="direct">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Neredeyse hiç (1)</option>
                <option value="2" selected>Bazen (2)</option>
                <option value="3">Sık sık (3)</option>
                <option value="4">Çok sık (4)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>3. Kişisel sorunlarınızla başa çıkma becerilerinize güvenme sıklığınız nedir?</label>
            <select class="hc-stress-q" data-type="reverse">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Neredeyse hiç (1)</option>
                <option value="2" selected>Bazen (2)</option>
                <option value="3">Sık sık (3)</option>
                <option value="4">Çok sık (4)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>4. Her şeyin yolunda gittiğini hissetme sıklığınız nedir?</label>
            <select class="hc-stress-q" data-type="reverse">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Neredeyse hiç (1)</option>
                <option value="2" selected>Bazen (2)</option>
                <option value="3">Sık sık (3)</option>
                <option value="4">Çok sık (4)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>5. Sorunların üst üste yığıldığını ve bunları aşamayacağınızı hissetme sıklığınız nedir?</label>
            <select class="hc-stress-q" data-type="direct">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Neredeyse hiç (1)</option>
                <option value="2" selected>Bazen (2)</option>
                <option value="3">Sık sık (3)</option>
                <option value="4">Çok sık (4)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcStressHesapla()">Stres Yükünü Hesapla</button>
        
        <div class="hc-result" id="hc-stress-result">
            <h4>Stres Yükü Analiz Sonucu:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Algılanan Stres Puanı</td>
                        <td id="hc-stress-res-skor">0 / 20</td>
                    </tr>
                    <tr>
                        <td>Stres Derecelendirmesi</td>
                        <td id="hc-stress-res-durum" style="font-weight:bold;">Orta</td>
                    </tr>
                    <tr>
                        <td>Tavsiyeler</td>
                        <td id="hc-stress-res-tavsiye">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}