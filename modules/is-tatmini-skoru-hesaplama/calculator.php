<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_is_tatmini_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-job-satisfaction',
        HC_PLUGIN_URL . 'modules/is-tatmini-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-job-satisfaction-css',
        HC_PLUGIN_URL . 'modules/is-tatmini-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-is-tatmini-skoru-hesaplama">
        <h3>İş Tatmini Skoru Hesaplama</h3>
        <p style="font-size:13px; color:#666; margin-bottom:15px;">Mevcut işinizdeki memnuniyet düzeyinizi yansıtan seçeneği işaretleyin:</p>
        
        <div class="hc-form-group">
            <label>1. Yaptığım iş bana bir başarı ve doyum hissi veriyor.</label>
            <select class="hc-job-q">
                <option value="1">Hiç Katılmıyorum (1)</option>
                <option value="2">Katılmıyorum (2)</option>
                <option value="3" selected>Kararsızım (3)</option>
                <option value="4">Katılıyorum (4)</option>
                <option value="5">Kesinlikle Katılıyorum (5)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>2. Yöneticilerim başarılarımı takdir ediyor ve bana adil davranıyor.</label>
            <select class="hc-job-q">
                <option value="1">Hiç Katılmıyorum (1)</option>
                <option value="2">Katılmıyorum (2)</option>
                <option value="3" selected>Kararsızım (3)</option>
                <option value="4">Katılıyorum (4)</option>
                <option value="5">Kesinlikle Katılıyorum (5)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>3. Aldığım maaş ve yan hakların yaptığım işin karşılığı olduğunu düşünüyorum.</label>
            <select class="hc-job-q">
                <option value="1">Hiç Katılmıyorum (1)</option>
                <option value="2">Katılmıyorum (2)</option>
                <option value="3" selected>Kararsızım (3)</option>
                <option value="4">Katılıyorum (4)</option>
                <option value="5">Kesinlikle Katılıyorum (5)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>4. Çalışma saatlerim ve iş yoğunluğum özel hayat dengemi bozmuyor.</label>
            <select class="hc-job-q">
                <option value="1">Hiç Katılmıyorum (1)</option>
                <option value="2">Katılmıyorum (2)</option>
                <option value="3" selected>Kararsızım (3)</option>
                <option value="4">Katılıyorum (4)</option>
                <option value="5">Kesinlikle Katılıyorum (5)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>5. Bu şirkette kendimi güvende ve geleceğe yönelik gelişim içinde hissediyorum.</label>
            <select class="hc-job-q">
                <option value="1">Hiç Katılmıyorum (1)</option>
                <option value="2">Katılmıyorum (2)</option>
                <option value="3" selected>Kararsızım (3)</option>
                <option value="4">Katılıyorum (4)</option>
                <option value="5">Kesinlikle Katılıyorum (5)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcJobTatminHesapla()">İş Tatmin Skorunu Hesapla</button>
        
        <div class="hc-result" id="hc-job-result">
            <h4>İş Hayatı Mutluluk Analiz Raporu:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>İş Tatmin Oranı</td>
                        <td id="hc-job-res-skor">%0</td>
                    </tr>
                    <tr>
                        <td>Genel Değerlendirme</td>
                        <td id="hc-job-res-durum" style="font-weight:bold;">Kararsız</td>
                    </tr>
                    <tr>
                        <td>Tavsiyeler</td>
                        <td id="hc-job-res-tavsiye">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}