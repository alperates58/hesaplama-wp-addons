<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yoksulluk_nafakasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yoksulluk-nafakasi',
        HC_PLUGIN_URL . 'modules/yoksulluk-nafakasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yoksulluk-nafakasi-css',
        HC_PLUGIN_URL . 'modules/yoksulluk-nafakasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yoksulluk-nafakasi-hesaplama">
        <h3>Yoksulluk Nafakası Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yn-odeyen-gelir">Nafaka Ödeyecek Eşin Aylık Net Geliri (₺)</label>
            <input type="number" id="hc-yn-odeyen-gelir" placeholder="Örn: 45000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-yn-alan-gelir">Nafaka Talep Eden Eşin Aylık Net Geliri (₺)</label>
            <input type="number" id="hc-yn-alan-gelir" placeholder="Geliri yoksa 0 girin" min="0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-yn-kusur">Eşlerin Boşanmadaki Kusur Durumu</label>
            <select id="hc-yn-kusur">
                <option value="uygun">Talep Eden Eş Kusursuz veya Daha Az Kusurlu</option>
                <option value="esit">Eşler Eşit Kusurlu</option>
                <option value="agir">Talep Eden Eş Ağır Kusurlu / Tam Kusurlu</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcYoksullukNafakasiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yn-result">
            <div id="hc-yn-error-msg" style="display:none; padding:12px; border:1px solid #fca5a5; background:#fef2f2; color:#991b1b; border-radius:8px; font-size:14px;"></div>
            <div id="hc-yn-success-data">
                <h4>Tahmini Aylık Yoksulluk Nafakası:</h4>
                <div class="hc-result-value" id="hc-yn-val">0 ₺</div>
                <div style="margin-top:12px; font-size:13px; color:#475569; line-height:1.4;">
                    TMK m. 175 uyarınca, boşanma yüzünden yoksulluğa düşecek taraf, geçimi için diğer taraftan mali gücü oranında süresiz olarak nafaka isteyebilir. Ancak nafaka talep edenin kusuru daha ağır olmamalıdır.
                </div>
            </div>
        </div>
    </div>
    <?php
}