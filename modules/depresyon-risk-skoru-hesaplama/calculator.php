<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_depresyon_risk_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-phq9-scale',
        HC_PLUGIN_URL . 'modules/depresyon-risk-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-phq9-scale-css',
        HC_PLUGIN_URL . 'modules/depresyon-risk-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-depresyon-risk-skoru-hesaplama">
        <h3>Depresyon Risk Skoru Hesaplama (PHQ-9)</h3>
        <p style="font-size:13px; color:#666; margin-bottom:15px;">Son iki hafta içinde aşağıdaki sorunlar sizi ne sıklıkla rahatsız etti?</p>
        
        <div class="hc-form-group">
            <label>1. Herhangi bir iş yapmaya karşı isteksizlik veya hayattan zevk alamama:</label>
            <select class="hc-phq-q">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Birkaç gün (1)</option>
                <option value="2" selected>Günlerin yarısından fazlasında (2)</option>
                <option value="3">Neredeyse her gün (3)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>2. Kendini kederli, karamsar veya umutsuz hissetme:</label>
            <select class="hc-phq-q">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Birkaç gün (1)</option>
                <option value="2" selected>Günlerin yarısından fazlasında (2)</option>
                <option value="3">Neredeyse her gün (3)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>3. Uykuya dalmada veya uykuyu sürdürmede güçlük çekme ya da aşırı uyuma:</label>
            <select class="hc-phq-q">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Birkaç gün (1)</option>
                <option value="2" selected>Günlerin yarısından fazlasında (2)</option>
                <option value="3">Neredeyse her gün (3)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>4. Kendini yorgun hissetme veya enerjinin az olması:</label>
            <select class="hc-phq-q">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Birkaç gün (1)</option>
                <option value="2" selected>Günlerin yarısından fazlasında (2)</option>
                <option value="3">Neredeyse her gün (3)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>5. Kendini başarısız hissetme, kendini veya ailesini hayal kırıklığına uğratmış görme:</label>
            <select class="hc-phq-q">
                <option value="0">Hiçbir zaman (0)</option>
                <option value="1">Birkaç gün (1)</option>
                <option value="2" selected>Günlerin yarısından fazlasında (2)</option>
                <option value="3">Neredeyse her gün (3)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcDepresyonHesapla()">Risk Skorunu Gör</button>
        
        <div class="hc-result" id="hc-phq-result">
            <h4>Depresyon Şiddet Analiz Raporu:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam PHQ-9 Puanı</td>
                        <td id="hc-phq-res-skor">0 / 15</td>
                    </tr>
                    <tr>
                        <td>Şiddet Derecesi</td>
                        <td id="hc-phq-res-durum" style="font-weight:bold;">Orta Derece Depresyon</td>
                    </tr>
                    <tr>
                        <td>Uzman Tavsiye Notu</td>
                        <td id="hc-phq-res-not">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}