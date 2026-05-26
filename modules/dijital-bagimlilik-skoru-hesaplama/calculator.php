<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dijital_bagimlilik_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-digi-addict',
        HC_PLUGIN_URL . 'modules/dijital-bagimlilik-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-digi-addict-css',
        HC_PLUGIN_URL . 'modules/dijital-bagimlilik-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dijital-bagimlilik-skoru-hesaplama">
        <h3>Dijital Bağımlılık Skoru Hesaplama</h3>
        <p style="font-size:13px; color:#666; margin-bottom:15px;">Günlük dijital cihaz kullanım sıklığınızı yansıtan seçeneği belirtin:</p>
        
        <div class="hc-form-group">
            <label>1. Sabah uyanır uyanmaz ilk iş olarak telefonumu kontrol ederim.</label>
            <select class="hc-digi-q">
                <option value="1">Asla (1)</option>
                <option value="2">Nadir (2)</option>
                <option value="3" selected>Bazen (3)</option>
                <option value="4">Sık Sık (4)</option>
                <option value="5">Her Zaman (5)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>2. Telefonum yanımda olmadığında endişeli veya huzursuz hissediyorum.</label>
            <select class="hc-digi-q">
                <option value="1">Asla (1)</option>
                <option value="2">Nadir (2)</option>
                <option value="3" selected>Bazen (3)</option>
                <option value="4">Sık Sık (4)</option>
                <option value="5">Her Zaman (5)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>3. Planladığımdan daha fazla süreyi ekrana bakarak geçiriyorum.</label>
            <select class="hc-digi-q">
                <option value="1">Asla (1)</option>
                <option value="2">Nadir (2)</option>
                <option value="3" selected>Bazen (3)</option>
                <option value="4">Sık Sık (4)</option>
                <option value="5">Her Zaman (5)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>4. Çevremdeki insanlar telefonla çok vakit geçirmemden şikayet ederler.</label>
            <select class="hc-digi-q">
                <option value="1">Asla (1)</option>
                <option value="2">Nadir (2)</option>
                <option value="3" selected>Bazen (3)</option>
                <option value="4">Sık Sık (4)</option>
                <option value="5">Her Zaman (5)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>5. Ekran sürem yüzünden işim, derslerim veya sorumluluklarım aksıyor.</label>
            <select class="hc-digi-q">
                <option value="1">Asla (1)</option>
                <option value="2">Nadir (2)</option>
                <option value="3" selected>Bazen (3)</option>
                <option value="4">Sık Sık (4)</option>
                <option value="5">Her Zaman (5)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcDigiHesapla()">Bağımlılık Skorunu Ölç</button>
        
        <div class="hc-result" id="hc-digi-result">
            <h4>Dijital Bağımlılık Raporu:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Dijital Bağımlılık Skoru</td>
                        <td id="hc-digi-res-skor">0 / 25</td>
                    </tr>
                    <tr>
                        <td>Bağımlılık Seviyesi</td>
                        <td id="hc-digi-res-durum" style="font-weight:bold;">Orta</td>
                    </tr>
                    <tr>
                        <td>Önerilen Çözüm / Detoks</td>
                        <td id="hc-digi-res-tavsiye">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}