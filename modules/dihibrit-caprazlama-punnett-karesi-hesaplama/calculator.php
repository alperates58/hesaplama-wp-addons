<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dihibrit_caprazlama_punnett_karesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dihibrit-caprazlama-punnett-karesi-hesaplama',
        HC_PLUGIN_URL . 'modules/dihibrit-caprazlama-punnett-karesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dihibrit-caprazlama-punnett-karesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dihibrit-caprazlama-punnett-karesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dihibrit-caprazlama-punnett-karesi-hesaplama">
        <h3>Dihibrit Çaprazlama (Punnett Karesi)</h3>
        <p style="font-size: 0.9em; margin-bottom: 15px; opacity: 0.8;">AaBb x AaBb çaprazlaması için sonuçları hesaplar.</p>
        
        <button class="hc-btn" onclick="hcDihibritHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dihibrit-result">
            <div id="hc-punnett-table-container" style="overflow-x: auto; margin-bottom: 20px;">
                <!-- Tablo JS ile oluşturulacak -->
            </div>
            
            <div class="hc-dihibrit-summary">
                <h4>Fenotip Oranları (9:3:3:1)</h4>
                <ul id="hc-phenotype-list">
                    <!-- Liste JS ile doldurulacak -->
                </ul>
            </div>
        </div>
    </div>
    <?php
}
