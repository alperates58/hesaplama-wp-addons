<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_desil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-desil-hesaplama',
        HC_PLUGIN_URL . 'modules/desil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-desil-hesaplama-css',
        HC_PLUGIN_URL . 'modules/desil-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-decile">
        <h3>Desil Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dec-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-dec-data" class="hc-input" placeholder="Örn: 10, 20, 30, 40, 50, 60, 70, 80, 90, 100"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-dec-target">Hesaplanacak Desil:</label>
            <select id="hc-dec-target" class="hc-input">
                <option value="all">Tüm Desiller (D1 - D9)</option>
                <?php for($i=1; $i<=9; $i++): ?>
                    <option value="<?php echo $i; ?>">D<?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDesilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-desil-hesaplama-result">
            <div id="hc-dec-summary" class="hc-result-label" style="margin-bottom: 15px;"></div>
            <table class="hc-table" style="width: 100%; text-align: center;">
                <thead>
                    <tr>
                        <th>Desil</th>
                        <th>Değer</th>
                    </tr>
                </thead>
                <tbody id="hc-dec-tbody"></tbody>
            </table>
        </div>
    </div>
    <?php
}
