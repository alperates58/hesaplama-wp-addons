<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_restoran_bahsis_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tip-calc',
        HC_PLUGIN_URL . 'modules/restoran-bahsis-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tip-calculator">
        <h3>Bahşiş Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tip-bill">Hesap Tutarı (₺):</label>
            <input type="number" id="hc-tip-bill" placeholder="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-tip-pct">Bahşiş Oranı (%):</label>
            <select id="hc-tip-pct">
                <option value="5">%5 (Standart)</option>
                <option value="10" selected>%10 (İyi Servis)</option>
                <option value="15">%15 (Harika Servis)</option>
                <option value="0">Bahşiş Yok</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-tip-split">Kişi Sayısı (Alman Usulü):</label>
            <input type="number" id="hc-tip-split" value="1">
        </div>
        <button class="hc-btn" onclick="hcTipHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tip-result">
            <strong>Toplam Bahşiş:</strong>
            <div id="hc-tip-val" class="hc-result-value">-</div>
            <p id="hc-tip-total-info"></p>
        </div>
    </div>
    <?php
}
