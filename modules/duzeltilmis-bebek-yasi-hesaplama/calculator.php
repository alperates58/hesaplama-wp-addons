<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_duzeltilmis_bebek_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-duzeltilmis-yas',
        HC_PLUGIN_URL . 'modules/duzeltilmis-bebek-yasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-duzeltilmis-yas">
        <h3>Düzeltilmiş Bebek Yaşı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dby-dogum">Gerçek Doğum Tarihi</label>
            <input type="date" id="hc-dby-dogum">
        </div>
        <div class="hc-form-group">
            <label for="hc-dby-hafta">Doğduğu Gebelik Haftası</label>
            <input type="number" id="hc-dby-hafta" placeholder="Örn: 32" min="20" max="37">
        </div>
        <button class="hc-btn" onclick="hcDuzeltilmisYasHesapla()">Yaşı Hesapla</button>
        <div class="hc-result" id="hc-duzeltilmis-yas-result">
            <div style="text-align: center;">
                <span style="font-size: 14px; color: var(--hc-front-muted);">Düzeltilmiş Yaş</span>
                <div class="hc-result-value" id="hc-res-dby-yas">-</div>
            </div>
            <p style="font-size: 12px; margin-top: 10px; color: var(--hc-front-muted);">* Düzeltilmiş yaş, bebeğiniz 2 yaşına gelene kadar gelişim takibi için kullanılır.</p>
        </div>
    </div>
    <?php
}
