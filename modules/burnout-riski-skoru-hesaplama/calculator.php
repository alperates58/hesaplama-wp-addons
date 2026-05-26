<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burnout_riski_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burnout-scale',
        HC_PLUGIN_URL . 'modules/burnout-riski-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burnout-scale-css',
        HC_PLUGIN_URL . 'modules/burnout-riski-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burnout-riski-skoru-hesaplama">
        <h3>Tükenmişlik (Burnout) Riski Ölçeği</h3>
        <p style="font-size:13px; color:#666; margin-bottom:15px;">Aşağıdaki ifadelere ne sıklıkla katıldığınızı seçiniz:</p>
        
        <div class="hc-form-group">
            <label>1. İş günü sonunda kendimi tamamen tükenmiş ve enerjisiz hissediyorum.</label>
            <select class="hc-burn-q" data-score="1">
                <option value="1">Hiçbir zaman (1)</option>
                <option value="2">Nadir (2)</option>
                <option value="3" selected>Bazen (3)</option>
                <option value="4">Sık Sık (4)</option>
                <option value="5">Her zaman (5)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>2. Sabah uyandığımda kendimi yeni bir iş gününe hazır hissetmiyorum.</label>
            <select class="hc-burn-q" data-score="1">
                <option value="1">Hiçbir zaman (1)</option>
                <option value="2">Nadir (2)</option>
                <option value="3" selected>Bazen (3)</option>
                <option value="4">Sık Sık (4)</option>
                <option value="5">Her zaman (5)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>3. Yaptığım işe karşı olan ilgimin ve motivasyonumun kaybolduğunu hissediyorum.</label>
            <select class="hc-burn-q" data-score="1">
                <option value="1">Hiçbir zaman (1)</option>
                <option value="2">Nadir (2)</option>
                <option value="3" selected>Bazen (3)</option>
                <option value="4">Sık Sık (4)</option>
                <option value="5">Her zaman (5)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>4. En ufak terslikler veya talepler bile bende öfke veya engellenmişlik hissi yaratıyor.</label>
            <select class="hc-burn-q" data-score="1">
                <option value="1">Hiçbir zaman (1)</option>
                <option value="2">Nadir (2)</option>
                <option value="3" selected>Bazen (3)</option>
                <option value="4">Sık Sık (4)</option>
                <option value="5">Her zaman (5)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>5. İşimin faydasını ve anlamını sorguluyorum, kendimi yabancılaşmış hissediyorum.</label>
            <select class="hc-burn-q" data-score="1">
                <option value="1">Hiçbir zaman (1)</option>
                <option value="2">Nadir (2)</option>
                <option value="3" selected>Bazen (3)</option>
                <option value="4">Sık Sık (4)</option>
                <option value="5">Her zaman (5)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcBurnoutHesapla()">Tükenmişlik Skorunu Gör</button>
        
        <div class="hc-result" id="hc-burn-result">
            <h4>Tükenmişlik Durumu Değerlendirmesi:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Burnout Puanı</td>
                        <td id="hc-burn-res-skor">0 / 25</td>
                    </tr>
                    <tr>
                        <td>Risk Kategorisi</td>
                        <td id="hc-burn-res-durum" style="font-weight:bold;">Orta Derece</td>
                    </tr>
                    <tr>
                        <td>Önerilen Tedbir / Aksiyon Planı</td>
                        <td id="hc-burn-res-tavsiye">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}