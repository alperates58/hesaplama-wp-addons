<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_emzirme_donemi_kalori_ihtiyaci( $atts ) {
    wp_enqueue_script(
        'hc-lactation-calories',
        HC_PLUGIN_URL . 'modules/emzirme-donemi-kalori-ihtiyaci/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lactation">
        <h3>Emzirme Dönemi Kalori İhtiyacı</h3>
        
        <div class="hc-form-group">
            <label for="hc-lc-tdee">Normal Günlük Kalori İhtiyacınız (TDEE)</label>
            <input type="number" id="hc-lc-tdee" placeholder="Örn: 2000">
            <small>Bilmiyorsanız Günlük Kalori İhtiyacı hesaplayıcısını kullanın.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-lc-ay">Bebeğiniz Kaç Aylık?</label>
            <select id="hc-lc-ay">
                <option value="330">0 - 6 Ay (Sadece Anne Sütü)</option>
                <option value="400">6 Ay ve Üzeri (Ek Gıdaya Geçiş)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcEmzirmeKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-emzirme-result">
            <div class="hc-result-item">
                <span>Eklenmesi Gereken Kalori:</span>
                <strong id="hc-lc-extra">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Günlük Kalori Hedefi:</span>
                <div class="hc-result-value" id="hc-lc-total">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Emzirme dönemi, vücudun enerji harcamasını önemli ölçüde artırır. Yeterli kalori ve sıvı alımı süt kalitesi için kritiktir.
            </p>
        </div>
    </div>
    <?php
}
