<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lastik_ebat_hesaplayicisi( $atts ) {
    wp_enqueue_script(
        'hc-lastik-ebat-hesaplayicisi',
        HC_PLUGIN_URL . 'modules/lastik-ebat-hesaplayicisi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lastik-ebat-hesaplayicisi-css',
        HC_PLUGIN_URL . 'modules/lastik-ebat-hesaplayicisi/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lastik-ebat-hesaplayicisi">
        <div class="hc-header">
            <h3>Lastik Ebat Hesaplayıcısı</h3>
            <p>Orijinal ve yeni lastik ebatlarını karşılaştırın, değişim riskini öğrenin.</p>
        </div>
        
        <div class="hc-tire-grid">
            <div class="hc-tire-column">
                <div class="hc-tire-label">Eski Lastik (Orijinal)</div>
                <div class="hc-tire-inputs">
                    <input type="number" id="hc-width1" placeholder="Taban (195)" value="195">
                    <input type="number" id="hc-ratio1" placeholder="Yanak (65)" value="65">
                    <input type="number" id="hc-rim1" placeholder="Jant (15)" value="15">
                </div>
            </div>
            
            <div class="hc-tire-column">
                <div class="hc-tire-label">Yeni Lastik</div>
                <div class="hc-tire-inputs">
                    <input type="number" id="hc-width2" placeholder="Taban (205)" value="205">
                    <input type="number" id="hc-ratio2" placeholder="Yanak (55)" value="55">
                    <input type="number" id="hc-rim2" placeholder="Jant (16)" value="16">
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcLastikHesapla()">
            <span>Karşılaştır</span>
            <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8Z"/></svg>
        </button>

        <div class="hc-result" id="hc-lastik-result">
            <div class="hc-result-header">Değişim Analizi</div>
            
            <div class="hc-diff-val">
                <small>Çap Farkı</small>
                <strong id="hc-res-diff-perc">0.00%</strong>
                <p id="hc-res-status">-</p>
            </div>

            <div class="hc-res-grid">
                <div class="hc-res-card">
                    <span>Eski Çap</span>
                    <strong id="hc-res-diam1">0 mm</strong>
                </div>
                <div class="hc-res-card">
                    <span>Yeni Çap</span>
                    <strong id="hc-res-diam2">0 mm</strong>
                </div>
                <div class="hc-res-card">
                    <span>Hız Göstergesi</span>
                    <p id="hc-res-speed">100 km/h iken <strong>-</strong></p>
                </div>
            </div>
        </div>
    </div>
    <?php
}
