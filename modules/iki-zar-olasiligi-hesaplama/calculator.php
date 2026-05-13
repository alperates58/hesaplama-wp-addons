<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iki_zar_olasiligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-iki-zar-olasiligi-hesaplama',
        HC_PLUGIN_URL . 'modules/iki-zar-olasiligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-iki-zar-olasiligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/iki-zar-olasiligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-iki-zar">
        <h3>İki Zar Olasılığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dice-target">Hedef Toplam (2-12):</label>
            <select id="hc-dice-target" class="hc-input">
                <option value="all">Tüm Toplamlar</option>
                <?php for($i=2; $i<=12; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <button class="hc-btn" onclick="hcIkiZarHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-iki-zar-result">
            <div id="hc-dice-summary" class="hc-result-label" style="margin-bottom: 15px;"></div>
            <table class="hc-table" id="hc-dice-table" style="width: 100%; text-align: center;">
                <thead>
                    <tr>
                        <th>Toplam</th>
                        <th>Kombinasyon Sayısı</th>
                        <th>Olasılık</th>
                    </tr>
                </thead>
                <tbody id="hc-dice-tbody"></tbody>
            </table>
        </div>
    </div>
    <?php
}
