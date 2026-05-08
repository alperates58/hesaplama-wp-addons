<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_idrar_rengi_su_durumu( $atts ) {
    wp_enqueue_script(
        'hc-urine-color',
        HC_PLUGIN_URL . 'modules/idrar-rengi-su-durumu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-urine-color-css',
        HC_PLUGIN_URL . 'modules/idrar-rengi-su-durumu/calculator.css',
        ['hesaplama-suite'], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-urine">
        <h3>İdrar Rengi ile Su Durumu Analizi</h3>
        
        <p style="font-size: 0.9em; margin-bottom: 20px;">Lütfen idrar renginize en yakın olanı seçin:</p>

        <div class="hc-urine-grid">
            <div class="hc-urine-item" onclick="hcUrineAnalyze(1)" style="background-color: #fdfdfd; border: 1px solid #ddd;"></div>
            <div class="hc-urine-item" onclick="hcUrineAnalyze(2)" style="background-color: #fff8bc;"></div>
            <div class="hc-urine-item" onclick="hcUrineAnalyze(3)" style="background-color: #ffef6a;"></div>
            <div class="hc-urine-item" onclick="hcUrineAnalyze(4)" style="background-color: #fcd500;"></div>
            <div class="hc-urine-item" onclick="hcUrineAnalyze(5)" style="background-color: #e5b700;"></div>
            <div class="hc-urine-item" onclick="hcUrineAnalyze(6)" style="background-color: #cc9c00;"></div>
            <div class="hc-urine-item" onclick="hcUrineAnalyze(7)" style="background-color: #b37d00;"></div>
            <div class="hc-urine-item" onclick="hcUrineAnalyze(8)" style="background-color: #8b5a00;"></div>
        </div>

        <div class="hc-result" id="hc-urine-result">
            <div id="hc-ur-status" style="padding: 15px; border-radius: 8px; text-align: center; font-weight: bold;">
                <!-- Durum -->
            </div>
            <div id="hc-ur-desc" style="margin-top: 15px; font-size: 0.9em; line-height: 1.5;">
                <!-- Açıklama -->
            </div>
            <p style="font-size: 0.8em; color: #666; margin-top: 15px; border-top: 1px solid #eee; padding-top: 10px;">
                *Vitamin takviyeleri veya bazı gıdalar (örn. pancar) idrar rengini geçici olarak değiştirebilir.
            </p>
        </div>
    </div>
    <?php
}
