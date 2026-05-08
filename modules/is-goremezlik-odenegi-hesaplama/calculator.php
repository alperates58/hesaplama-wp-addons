<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_is_goremezlik_odenegi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-is-goremezlik',
        HC_PLUGIN_URL . 'modules/is-goremezlik-odenegi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-is-goremezlik-css',
        HC_PLUGIN_URL . 'modules/is-goremezlik-odenegi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-is-goremezlik-odenegi-hesaplama">
        <h3>İş Göremezlik Ödeneği Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-ig-salary">Son 12 Aylık Ortalama Brüt Kazanç (TL)</label>
            <input type="number" id="hc-ig-salary" placeholder="Günlük Brüt = Kazanç / 30">
        </div>

        <div class="hc-form-group">
            <label for="hc-ig-type">Rapor Türü</label>
            <select id="hc-ig-type">
                <option value="out">Ayakta Tedavi (2/3 Ödenir)</option>
                <option value="in">Yatarak Tedavi (1/2 Ödenir)</option>
                <option value="maternity">Analık / İş Kazası (2/3 Ödenir)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ig-days">Raporlu Gün Sayısı</label>
            <input type="number" id="hc-ig-days" placeholder="Örn: 10">
            <small>Not: Hastalık raporlarında ilk 2 gün ödenmez.</small>
        </div>
        
        <button class="hc-btn" onclick="hcIsGoremezlikHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-is-goremezlik-result">
            <div class="hc-result-item">
                <span>Günlük Ödenek:</span>
                <strong id="hc-ig-res-daily">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Ödeme Yapılacak Gün:</span>
                <strong id="hc-ig-res-paid-days">-</strong>
            </div>
            <div class="hc-result-value" id="hc-ig-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam SGK İş Göremezlik Ödemesi</p>
        </div>
    </div>
    <?php
}
