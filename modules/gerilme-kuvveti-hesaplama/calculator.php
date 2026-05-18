<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gerilme_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gerilme-kuvveti-hesaplama',
        HC_PLUGIN_URL . 'modules/gerilme-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gerilme-kuvveti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gerilme-kuvveti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gerilme-kuvveti-hesaplama">
        <h3>Gerilme Kuvveti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gk2-kutle">Asılı Kütle (m - kg)</label>
            <input type="number" step="any" id="hc-gk2-kutle" placeholder="Örn: 5" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-gk2-ivme">Sistem İvmesi (a - m/s²)</label>
            <input type="number" step="any" id="hc-gk2-ivme" value="0" placeholder="İvmesiz (sabit hızlı/durgun) ise 0" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-gk2-yon">Hareket Yönü (Dikey)</label>
            <select id="hc-gk2-yon">
                <option value="durgun">Durgun / Sabit Hızlı (a = 0)</option>
                <option value="yukari">Yukarı Yönlü Hızlanan (veya Aşağı Yönlü Yavaşlayan)</option>
                <option value="asagi">Aşağı Yönlü Hızlanan (veya Yukarı Yönlü Yavaşlayan)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcGerilmeKuvvetiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gerilme-kuvveti-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
