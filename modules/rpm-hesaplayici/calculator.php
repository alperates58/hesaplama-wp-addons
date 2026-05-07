<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rpm_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-rpm-hesaplayici',
        HC_PLUGIN_URL . 'modules/rpm-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rpm-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/rpm-hesaplayici/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rpm-hesaplayici">
        <div class="hc-header">
            <h3>RPM Hesaplayıcı</h3>
            <p>Hız ve vites oranlarına göre motorunuzun hangi devirde çalışacağını öğrenin.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-rpm-hiz">Hız (km/h)</label>
                <input type="number" id="hc-rpm-hiz" placeholder="Örn: 100" value="100">
            </div>

            <div class="hc-form-group">
                <label>Lastik Ebatı</label>
                <div class="hc-tire-inputs">
                    <input type="number" id="hc-rpm-w" placeholder="Taban" value="195">
                    <input type="number" id="hc-rpm-r" placeholder="Yanak" value="65">
                    <input type="number" id="hc-rpm-rim" placeholder="Jant" value="15">
                </div>
            </div>

            <div class="hc-form-group">
                <label for="hc-gear-ratio">Vites Oranı</label>
                <input type="number" id="hc-gear-ratio" placeholder="Örn: 0.85" value="0.85" step="0.01">
            </div>

            <div class="hc-form-group">
                <label for="hc-final-drive">Diferansiyel Oranı</label>
                <input type="number" id="hc-final-drive" placeholder="Örn: 3.73" value="3.73" step="0.01">
            </div>
        </div>

        <button class="hc-btn" onclick="hcRPMHesapla()">Devri Hesapla</button>

        <div class="hc-result" id="hc-rpm-result">
            <div class="hc-result-header">Motor Devri</div>
            <div class="hc-main-res">
                <strong id="hc-res-rpm">-</strong>
                <span>RPM</span>
            </div>
            <div class="hc-info-text">
                Bu hızda motorunuz yukarıdaki devirde çalışacaktır.
            </div>
        </div>
    </div>
    <?php
}
