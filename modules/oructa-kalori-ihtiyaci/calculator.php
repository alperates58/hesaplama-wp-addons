<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_oructa_kalori_ihtiyaci( $atts ) {
    wp_enqueue_script(
        'hc-fasting-calories',
        HC_PLUGIN_URL . 'modules/oructa-kalori-ihtiyaci/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fasting">
        <h3>Oruçta Kalori İhtiyacı Dağılımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-fc-tdee">Günlük Toplam Kalori İhtiyacınız (TDEE)</label>
            <input type="number" id="hc-fc-tdee" placeholder="Örn: 2000">
            <small>Bilmiyorsanız Günlük Kalori İhtiyacı hesaplayıcısını kullanın.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-fc-style">Oruç Tipi</label>
            <select id="hc-fc-style">
                <option value="ramadan">Ramazan Orucu (İftar & Sahur)</option>
                <option value="if168">Aralıklı Oruç (16:8 Metodu)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcOrucKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-fasting-result">
            <div id="hc-fc-distribution">
                <!-- JS ile doldurulacak -->
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px; border-top: 1px solid #eee; padding-top: 10px;">
                *Oruç tutarken sıvı alımına dikkat edilmeli, iftar ve sahur arasında yeterli su tüketilmelidir.
            </p>
        </div>
    </div>
    <?php
}
