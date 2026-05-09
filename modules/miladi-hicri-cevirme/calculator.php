<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_miladi_hicri_cevirme( $atts ) {
    wp_enqueue_script(
        'hc-miladi-hicri-cevirme',
        HC_PLUGIN_URL . 'modules/miladi-hicri-cevirme/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mh-calc">
        <h3>Miladi Hicri Çevirme</h3>
        <div class="hc-form-group">
            <label>Dönüşüm Tipi</label>
            <select id="hc-mh-type">
                <option value="m2h">Miladi -> Hicri</option>
                <option value="h2m">Hicri -> Miladi</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Tarih</label>
            <div id="hc-mh-date-inputs">
                <input type="date" id="hc-mh-m-date" value="<?php echo date('Y-m-d'); ?>">
                <div id="hc-mh-h-inputs" style="display: none; gap: 10px;">
                    <input type="number" id="hc-mh-h-day" placeholder="Gün" value="1">
                    <input type="number" id="hc-mh-h-month" placeholder="Ay (1-12)" value="1">
                    <input type="number" id="hc-mh-h-year" placeholder="Yıl (Hicri)" value="1447">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcMiladiHicriCevir()">Çevir</button>
        <div class="hc-result" id="hc-mh-result">
            <div class="hc-result-title">Dönüştürülen Tarih:</div>
            <div class="hc-result-value" id="hc-mh-val">-</div>
        </div>
    </div>
    <script>
    document.getElementById('hc-mh-type').addEventListener('change', function() {
        const mInput = document.getElementById('hc-mh-m-date');
        const hInputs = document.getElementById('hc-mh-h-inputs');
        if (this.value === 'm2h') {
            mInput.style.display = 'block';
            hInputs.style.display = 'none';
        } else {
            mInput.style.display = 'none';
            hInputs.style.display = 'flex';
        }
    });
    </script>
    <?php
}
