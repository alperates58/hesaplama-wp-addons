<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enjektor_yakit_debisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-injector-flow',
        HC_PLUGIN_URL . 'modules/enjektor-yakit-debisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-if-box">
        <h3>Enjektör Yakıt Debisi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Hedef Beygir Gücü (HP)</label>
            <input type="number" id="hc-if-hp" placeholder="300">
        </div>
        <div class="hc-form-group">
            <label>Silindir Sayısı</label>
            <input type="number" id="hc-if-cyl" value="4">
        </div>
        <div class="hc-form-group">
            <label>Motor Tipi</label>
            <select id="hc-if-bsfc">
                <option value="0.50">Atmosferik (NA) - BSFC 0.50</option>
                <option value="0.60">Turbo / Supercharged - BSFC 0.60</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcIfHesapla()">Debiyi Hesapla</button>
        <div class="hc-result" id="hc-if-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>lbs/hr (Heri biri):</strong><br><span id="hc-if-lbs">-</span></div>
                <div><strong>cc/min (Heri biri):</strong><br><span id="hc-if-cc">-</span></div>
            </div>
            <p style="font-size: 0.8em; color: #888; margin-top: 15px;">* %80 duty cycle (çalışma çevrimi) baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
