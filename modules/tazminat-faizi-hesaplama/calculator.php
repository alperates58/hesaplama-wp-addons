<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tazminat_faizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tazminat-faiz',
        HC_PLUGIN_URL . 'modules/tazminat-faizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tazminat-faiz-css',
        HC_PLUGIN_URL . 'modules/tazminat-faizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tazminat-faizi-hesaplama">
        <h3>Tazminat Faizi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-tfz-principal">Ana Para (Tazminat) (TL)</label>
            <input type="number" id="hc-tfz-principal" placeholder="Asıl alacak tutarı">
        </div>

        <div class="hc-form-group">
            <label for="hc-tfz-start">Başlangıç Tarihi</label>
            <input type="date" id="hc-tfz-start">
        </div>

        <div class="hc-form-group">
            <label for="hc-tfz-end">Bitiş Tarihi (Hesap Tarihi)</label>
            <input type="date" id="hc-tfz-end">
        </div>

        <div class="hc-form-group">
            <label for="hc-tfz-rate">Faiz Türü</label>
            <select id="hc-tfz-rate">
                <option value="9">Yasal Faiz (%9)</option>
                <option value="24">Ticari Temerrüt Faizi (%24)</option>
                <option value="30">Mevduat Faizi (En Yüksek - %30)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcTazminatFaiziHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-tazminat-result">
            <div class="hc-result-item">
                <span>Geçen Süre:</span>
                <strong id="hc-tfz-res-days">-</strong>
            </div>
            <div class="hc-result-item">
                <span>İşlemiş Faiz:</span>
                <strong id="hc-tfz-res-interest">-</strong>
            </div>
            <div class="hc-result-value" id="hc-tfz-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Alacak (Ana Para + Faiz)</p>
        </div>
    </div>
    <?php
}
