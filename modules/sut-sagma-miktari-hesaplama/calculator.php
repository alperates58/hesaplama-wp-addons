<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sut_sagma_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sut-sagma',
        HC_PLUGIN_URL . 'modules/sut-sagma-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-sut-sagma">
        <h3>Süt Sağma Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ssm-kilo">Bebeğin Ağırlığı (kg)</label>
            <input type="number" id="hc-ssm-kilo" placeholder="Örn: 5.5" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ssm-aralik">Sağma Aralığı (Saat)</label>
            <input type="number" id="hc-ssm-aralik" value="3" min="1" max="12">
        </div>
        <button class="hc-btn" onclick="hcSutSagmaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sut-sagma-result">
            <div style="text-align: center;">
                <span style="font-size: 14px; color: var(--hc-front-muted);">Hedeflenen Sağma Miktarı</span>
                <div class="hc-result-value" id="hc-res-ssm-miktar">-</div>
            </div>
        </div>
    </div>
    <?php
}
