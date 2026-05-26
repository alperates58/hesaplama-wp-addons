<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ozguven_gelisim_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-self-esteem',
        HC_PLUGIN_URL . 'modules/ozguven-gelisim-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-self-esteem-css',
        HC_PLUGIN_URL . 'modules/ozguven-gelisim-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ozguven-gelisim-skoru-hesaplama">
        <h3>Özgüven Gelişim Skoru Hesaplama</h3>
        <p style="font-size:13px; color:#666; margin-bottom:15px;">Aşağıdaki ifadelere ne ölçüde katıldığınızı belirtiniz:</p>
        
        <div class="hc-form-group">
            <label>1. Genel olarak kendimden memnunum.</label>
            <select class="hc-self-q" data-type="direct">
                <option value="3">Kesinlikle Katılıyorum (3)</option>
                <option value="2" selected>Katılıyorum (2)</option>
                <option value="1">Katılmıyorum (1)</option>
                <option value="0">Kesinlikle Katılmıyorum (0)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>2. Bazen kendimi hiç de iyi bir insan olarak görmüyorum.</label>
            <select class="hc-self-q" data-type="reverse">
                <option value="3">Kesinlikle Katılıyorum (3)</option>
                <option value="2">Katılıyorum (2)</option>
                <option value="1" selected>Katılmıyorum (1)</option>
                <option value="0">Kesinlikle Katılmıyorum (0)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>3. Kendimde gurur duyacak en az birkaç iyi özellik bulabiliyorum.</label>
            <select class="hc-self-q" data-type="direct">
                <option value="3">Kesinlikle Katılıyorum (3)</option>
                <option value="2" selected>Katılıyorum (2)</option>
                <option value="1">Katılmıyorum (1)</option>
                <option value="0">Kesinlikle Katılmıyorum (0)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>4. Kendimi başarısız bir insan olarak görme eğilimindeyim.</label>
            <select class="hc-self-q" data-type="reverse">
                <option value="3">Kesinlikle Katılıyorum (3)</option>
                <option value="2">Katılıyorum (2)</option>
                <option value="1" selected>Katılmıyorum (1)</option>
                <option value="0">Kesinlikle Katılmıyorum (0)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>5. Kendime karşı olumlu bir tutum içindeyim.</label>
            <select class="hc-self-q" data-type="direct">
                <option value="3">Kesinlikle Katılıyorum (3)</option>
                <option value="2" selected>Katılıyorum (2)</option>
                <option value="1">Katılmıyorum (1)</option>
                <option value="0">Kesinlikle Katılmıyorum (0)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcOzguvenHesapla()">Özgüven Skorunu Analiz Et</button>
        
        <div class="hc-result" id="hc-self-result">
            <h4>Özgüven ve Benlik Saygısı Raporu:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Özgüven Puanı</td>
                        <td id="hc-self-res-skor">0 / 15</td>
                    </tr>
                    <tr>
                        <td>Benlik Saygısı Durumu</td>
                        <td id="hc-self-res-durum" style="font-weight:bold;">Orta</td>
                    </tr>
                    <tr>
                        <td>Gelişim Önerileri</td>
                        <td id="hc-self-res-tavsiye">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}