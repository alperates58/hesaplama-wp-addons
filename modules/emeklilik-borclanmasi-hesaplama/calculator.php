<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_emeklilik_borclanmasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-emeklilik-borclanmasi-hesaplama',
        HC_PLUGIN_URL . 'modules/emeklilik-borclanmasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-emeklilik-borclanmasi-css',
        HC_PLUGIN_URL . 'modules/emeklilik-borclanmasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-emeklilik-borclanmasi-hesaplama">
        <h3>Emeklilik Borçlanması Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-borc-type">Borçlanma Türü</label>
            <select id="hc-borc-type">
                <option value="standard">Doğum / Askerlik (%32 Prim)</option>
                <option value="overseas">Yurt Dışı Borçlanması (%45 Prim)</option>
                <option value="part-time">Kısmi Süreli Çalışma (%39 Prim)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-borc-days">Borçlanılacak Gün Sayısı</label>
            <input type="number" id="hc-borc-days" placeholder="Örn: 540">
        </div>

        <div class="hc-form-group">
            <label for="hc-borc-base">Günlük Kazanç Beyanı</label>
            <select id="hc-borc-base">
                <option value="min">Asgari (En Düşük)</option>
                <option value="max">Tavan (En Yüksek - 7.5 Kat)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcBorclanmaHesapla()">Tutar Hesapla</button>
        
        <div class="hc-result" id="hc-borclanma-result">
            <div class="hc-result-item">
                <span>Günlük Borçlanma Tutarı:</span>
                <strong id="hc-res-daily">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Süre:</span>
                <strong id="hc-res-total-days">-</strong>
            </div>
            <div class="hc-result-value" id="hc-res-total-cost">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Ödenecek Tutar (2026)</p>
        </div>
    </div>
    <?php
}
