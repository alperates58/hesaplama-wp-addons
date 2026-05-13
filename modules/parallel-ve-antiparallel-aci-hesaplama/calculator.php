<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_parallel_ve_antiparallel_aci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-parallel',
        HC_PLUGIN_URL . 'modules/parallel-ve-antiparallel-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-parallel-css',
        HC_PLUGIN_URL . 'modules/parallel-ve-antiparallel-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-parallel">
        <div class="hc-header">
            <h3>Parelel ve Kontra-Parelel Analizi</h3>
            <p>Gezegenlerin sadece boylamda değil, enlemde (deklinasyon) kurduğu gizli bağları keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-pa-p1">1. Gezegen</label>
                <select id="hc-pa-p1" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-pa-p2">2. Gezegen</label>
                <select id="hc-pa-p2" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-pa-type">Bağ Tipi</label>
                <select id="hc-pa-type" class="hc-input">
                    <option value="parallel">Parelel (Aynı Enlem)</option>
                    <option value="antiparallel">Kontra-Parelel (Zıt Enlem)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcParallelHesapla()">Bağı Analiz Et</button>

        <div class="hc-result" id="hc-pa-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Enerji Etkisi:</span>
                <span class="hc-result-value" id="hc-pa-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-pa-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
