<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arac_sigorta_primi_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sigorta-calc',
        HC_PLUGIN_URL . 'modules/arac-sigorta-primi-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-sig-calc">
        <h3>Araç Sigorta Primi Tahmini</h3>
        <div class="hc-form-group">
            <label>Araç Rayiç Değeri (TL)</label>
            <input type="number" id="hc-sig-value" placeholder="Örn: 1.000.000">
        </div>
        <div class="hc-form-group">
            <label>Sürücü Yaşı</label>
            <input type="number" id="hc-sig-age" value="30">
        </div>
        <div class="hc-form-group">
            <label>Hasarsızlık Basamağı</label>
            <select id="hc-sig-no-claim">
                <option value="0">0. Basamak (Hasarlı/Yeni)</option>
                <option value="1">1. Basamak</option>
                <option value="2">2. Basamak</option>
                <option value="3">3. Basamak</option>
                <option value="4" selected>4. Basamak (Standart)</option>
                <option value="5">5. Basamak</option>
                <option value="6">6. Basamak</option>
                <option value="7">7. Basamak (En Yüksek İndirim)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSigHesapla()">Tahmin Et</button>
        <div class="hc-result" id="hc-sig-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Tahmini Kasko:</strong><br><span id="hc-sig-kasko">-</span></div>
                <div><strong>Tahmini Trafik:</strong><br><span id="hc-sig-trafik">-</span></div>
            </div>
            <p style="font-size: 11px; color: #888; margin-top: 10px;">* Bu değerler tahmini olup, sigorta şirketlerine göre farklılık gösterir.</p>
        </div>
    </div>
    <?php
}
