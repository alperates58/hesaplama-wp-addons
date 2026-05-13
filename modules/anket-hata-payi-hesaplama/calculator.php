<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_anket_hata_payi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-anket-hata-payi-hesaplama',
        HC_PLUGIN_URL . 'modules/anket-hata-payi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-anket-hata-payi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/anket-hata-payi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-margin-error">
        <h3>Anket Hata Payı (Margin of Error) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-me-pop">Evren (Popülasyon) Büyüklüğü (Bilinmiyorsa boş bırakın):</label>
            <input type="number" id="hc-me-pop" class="hc-input" placeholder="Örn: 1000000">
        </div>
        <div class="hc-form-group">
            <label for="hc-me-sample">Örneklem Büyüklüğü (Katılımcı Sayısı):</label>
            <input type="number" id="hc-me-sample" class="hc-input" placeholder="Örn: 400">
        </div>
        <div class="hc-form-group">
            <label for="hc-me-conf">Güven Düzeyi (%):</label>
            <select id="hc-me-conf" class="hc-input">
                <option value="1.645">90%</option>
                <option value="1.96" selected>95%</option>
                <option value="2.576">99%</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcMarginErrorHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-anket-hata-payi-hesaplama-result">
            <div class="hc-result-label">Hata Payı (±):</div>
            <div class="hc-result-value" id="hc-res-me-val">-</div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Bu sonuç, anket sonucunuzun gerçek değerden en fazla ne kadar sapabileceğini gösterir.</p>
        </div>
    </div>
    <?php
}
