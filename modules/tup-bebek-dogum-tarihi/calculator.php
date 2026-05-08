<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tup_bebek_dogum_tarihi( $atts ) {
    wp_enqueue_script(
        'hc-ivf-due',
        HC_PLUGIN_URL . 'modules/tup-bebek-dogum-tarihi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ivf-box">
        <h3>Tüp Bebek (IVF) Doğum Tarihi</h3>
        
        <div class="hc-form-group">
            <label for="hc-ivf-date">Embriyo Transfer Tarihi</label>
            <input type="date" id="hc-ivf-date">
        </div>

        <div class="hc-form-group">
            <label for="hc-ivf-type">Embriyo Günü</label>
            <select id="hc-ivf-type">
                <option value="3">3. Gün Embriyosu</option>
                <option value="5">5. Gün Embriyosu (Blastokist)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcIVFDueHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ivf-due-result">
            <div class="hc-result-item">
                <span>Tahmini Doğum Tarihi:</span>
                <div class="hc-result-value" id="hc-ivf-value">-</div>
            </div>
            <div class="hc-result-item">
                <span>Gebelik Haftası:</span>
                <strong id="hc-ivf-week">-</strong>
            </div>
        </div>
    </div>
    <?php
}
