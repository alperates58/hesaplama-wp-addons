<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_emekli_ikramiyesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-emekli-ikramiyesi-hesaplama',
        HC_PLUGIN_URL . 'modules/emekli-ikramiyesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-emekli-ikramiyesi-css',
        HC_PLUGIN_URL . 'modules/emekli-ikramiyesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-emekli-ikramiyesi-hesaplama">
        <h3>Emekli İkramiyesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ikr-salary">Son Brüt Maaş (TL)</label>
            <input type="number" id="hc-ikr-salary" placeholder="Örn: 45000">
        </div>

        <div class="hc-form-group">
            <label for="hc-ikr-years">Toplam Çalışma Yılı</label>
            <input type="number" id="hc-ikr-years" placeholder="Örn: 25">
        </div>

        <div class="hc-form-group">
            <label for="hc-ikr-type">Çalışma Statüsü</label>
            <select id="hc-ikr-type">
                <option value="worker">İşçi (Kıdem Tazminatı)</option>
                <option value="officer">Memur (Emekli İkramiyesi)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcIkramiyeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ikramiye-result">
            <div class="hc-result-item">
                <span>Yıl Başına Tutar:</span>
                <strong id="hc-ikr-res-per-year">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Yıl:</span>
                <strong id="hc-ikr-res-total-years">-</strong>
            </div>
            <div class="hc-result-value" id="hc-ikr-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Tahmini Toplam İkramiye / Tazminat</p>
        </div>
    </div>
    <?php
}
