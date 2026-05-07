<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hamilelik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hamilelik-hesaplama',
        HC_PLUGIN_URL . 'modules/hamilelik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hamilelik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hamilelik-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hamilelik-hesaplama">
        <div class="hc-header">
            <h3>Hamilelik Hesaplayıcı</h3>
            <p>Tahmini doğum tarihinizi ve bebeğinizin gelişim haftasını öğrenin.</p>
        </div>
        
        <div class="hc-form-group">
            <label>Son Adet Tarihi (LMP)</label>
            <input type="date" id="hc-preg-lmp" value="<?php echo date('Y-m-d'); ?>">
            <small>Hamileliğin ilk günü olarak kabul edilen tarihtir.</small>
        </div>

        <button class="hc-btn" onclick="hcPregHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-preg-result">
            <div class="hc-preg-main-card">
                <div class="hc-preg-date">
                    <span>Tahmini Doğum Tarihi</span>
                    <strong id="hc-res-preg-due">-</strong>
                </div>
                <div class="hc-preg-stats">
                    <div class="hc-stat-item">
                        <span id="hc-res-preg-week">0</span>
                        <small>Haftalık</small>
                    </div>
                    <div class="hc-stat-item">
                        <span id="hc-res-preg-remain">0</span>
                        <small>Gün Kaldı</small>
                    </div>
                </div>
            </div>
            
            <div class="hc-preg-trimester">
                <div class="hc-res-label">TRIMESTER</div>
                <div class="hc-res-info" id="hc-res-preg-tri">-</div>
            </div>
        </div>
    </div>
    <?php
}
