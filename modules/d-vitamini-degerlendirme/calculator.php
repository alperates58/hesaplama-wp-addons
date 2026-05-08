<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_d_vitamini_degerlendirme( $atts ) {
    wp_enqueue_script(
        'hc-vit-d-eval',
        HC_PLUGIN_URL . 'modules/d-vitamini-degerlendirme/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-vit-d-eval">
        <h3>D Vitamini Seviyesi Değerlendirme</h3>
        
        <div class="hc-form-group">
            <label for="hc-vde-value">Tahlil Sonucu (25-OH Vitamin D)</label>
            <input type="number" id="hc-vde-value" placeholder="Değer">
        </div>

        <div class="hc-form-group">
            <label for="hc-vde-unit">Birim</label>
            <select id="hc-vde-unit">
                <option value="ng/ml">ng/mL</option>
                <option value="nmol/l">nmol/L</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcVitaminDDeğerlendir()">Değerlendir</button>

        <div class="hc-result" id="hc-vit-d-eval-result">
            <div id="hc-vde-status" style="padding: 15px; border-radius: 8px; text-align: center;">
                <span style="display: block; font-size: 0.9em; margin-bottom: 5px;">Durum:</span>
                <strong id="hc-vde-label" style="font-size: 1.6em;">-</strong>
            </div>
            <div id="hc-vde-desc" style="margin-top: 15px; font-size: 0.9em; line-height: 1.5;">
                <!-- Açıklama buraya -->
            </div>
            <p style="font-size: 0.8em; color: #666; margin-top: 15px; border-top: 1px solid #eee; padding-top: 10px;">
                *Bu araç sadece bilgilendirme amaçlıdır. Sonuçları mutlaka doktorunuzla görüşünüz. (1 ng/mL = 2.5 nmol/L)
            </p>
        </div>
    </div>
    <?php
}
