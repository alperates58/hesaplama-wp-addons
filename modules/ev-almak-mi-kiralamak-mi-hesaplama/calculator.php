<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ev_almak_mi_kiralamak_mi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-almak-mi-kiralamak-mi-hesaplama',
        HC_PLUGIN_URL . 'modules/ev-almak-mi-kiralamak-mi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ev-almak-mi-kiralamak-mi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ev-almak-mi-kiralamak-mi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ev-almak-mi-kiralamak-mi">
        <h3>Ev Almak mı Kiralamak mı?</h3>
        <div class="hc-compare-grid">
            <div class="hc-compare-col">
                <h4>Satın Alma</h4>
                <div class="hc-form-group">
                    <label>Ev Fiyatı (₺)</label>
                    <input type="number" id="hc-eak-price" placeholder="5.000.000">
                </div>
                <div class="hc-form-group">
                    <label>Peşinat (₺)</label>
                    <input type="number" id="hc-eak-downpayment" placeholder="1.000.000">
                </div>
                <div class="hc-form-group">
                    <label>Aylık Kredi Taksiti (₺)</label>
                    <input type="number" id="hc-eak-installment" placeholder="50.000">
                </div>
                <div class="hc-form-group">
                    <label>Beklenen Yıllık Değer Artışı (%)</label>
                    <input type="number" id="hc-eak-appreciation" placeholder="30" step="0.1">
                </div>
            </div>
            <div class="hc-compare-col">
                <h4>Kiralama</h4>
                <div class="hc-form-group">
                    <label>Aylık Kira (₺)</label>
                    <input type="number" id="hc-eak-rent" placeholder="25.000">
                </div>
                <div class="hc-form-group">
                    <label>Peşinatın Alternatif Getirisi (Yıllık %)</label>
                    <input type="number" id="hc-eak-investment-rate" placeholder="45" step="0.1">
                </div>
                <div class="hc-form-group">
                    <label>Analiz Süresi (Yıl)</label>
                    <input type="number" id="hc-eak-years" placeholder="10">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcEvAlmakMiKiralamakMiHesapla()">Karşılaştır</button>
        <div class="hc-result" id="hc-eak-result">
            <div class="hc-result-item">
                <span>Satın Alınca Toplam Varlık:</span>
                <strong id="hc-eak-res-buy">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kiralayıp Yatırım Yapınca Toplam Varlık:</span>
                <strong id="hc-eak-res-rent">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Öneri:</span>
                <strong class="hc-result-value" id="hc-eak-res-suggestion">-</strong>
            </div>
        </div>
    </div>
    <?php
}
