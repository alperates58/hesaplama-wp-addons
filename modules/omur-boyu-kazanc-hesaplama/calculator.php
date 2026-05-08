<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_omur_boyu_kazanc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lifetime',
        HC_PLUGIN_URL . 'modules/omur-boyu-kazanc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lifetime-css',
        HC_PLUGIN_URL . 'modules/omur-boyu-kazanc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lifetime">
        <h3>Ömür Boyu Kazanç Tahmini</h3>
        
        <div class="hc-form-group">
            <label for="hc-lt-income">Şu Anki Yıllık Net Gelir (TL)</label>
            <input type="number" id="hc-lt-income" placeholder="Yıllık toplam kazanç">
        </div>

        <div class="hc-form-group">
            <label for="hc-lt-years">Kalan Çalışma Süresi (Yıl)</label>
            <input type="number" id="hc-lt-years" value="25">
        </div>

        <div class="hc-form-group">
            <label for="hc-lt-growth">Beklenen Yıllık Maaş Artışı (%)</label>
            <input type="number" id="hc-lt-growth" value="10" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcLifetimeEarnings()">Hesapla</button>
        
        <div class="hc-result" id="hc-lifetime-result">
            <div class="hc-result-value" id="hc-lt-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Kariyer Sonu Toplam Kazanç Tahmini</p>
        </div>
    </div>
    <?php
}
