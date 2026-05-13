<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_harita_tipi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-harita-tipi',
        HC_PLUGIN_URL . 'modules/harita-tipi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-harita-tipi-css',
        HC_PLUGIN_URL . 'modules/harita-tipi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-harita-tipi">
        <div class="hc-header">
            <h3>Astrolojik Harita Tipi Analizi</h3>
            <p>Gezegenleriniz haritaya nasıl yayılmış? Bu dağılım sizin hayat stratejinizi belirler.</p>
        </div>
        
        <div class="hc-form-grid">
            <?php 
            $planets = ["Güneş", "Ay", "Merkür", "Venüs", "Mars", "Jüpiter", "Satürn", "Uranüs", "Neptün", "Plüton"];
            foreach($planets as $p): ?>
            <div class="hc-form-group">
                <label><?php echo $p; ?></label>
                <select class="hc-input hc-ht-planet" data-planet="<?php echo $p; ?>">
                    <?php for($i=1;$i<=12;$i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?>. Ev</option>
                    <?php endfor; ?>
                </select>
            </div>
            <?php endforeach; ?>
        </div>

        <button class="hc-btn" onclick="hcHaritaTipiHesapla()">Harita Tipimi Analiz Et</button>

        <div class="hc-result" id="hc-ht-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Harita Modeliniz:</span>
                <span class="hc-result-value" id="hc-ht-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-ht-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
