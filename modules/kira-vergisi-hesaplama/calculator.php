<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kira_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kira-vergi',
        HC_PLUGIN_URL . 'modules/kira-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kira-vergi-css',
        HC_PLUGIN_URL . 'modules/kira-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kira-vergisi-hesaplama">
        <h3>Kira Vergisi Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-kvg-income">Yıllık Toplam Kira Geliri (TL)</label>
            <input type="number" id="hc-kvg-income" placeholder="Örn: 240000">
        </div>

        <div class="hc-form-group">
            <label for="hc-kvg-type">Mülk Türü</label>
            <select id="hc-kvg-type">
                <option value="konut">Konut (Mesken)</option>
                <option value="isyeri">İş Yeri (Stopajlı)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-kvg-expense">Gider Yöntemi</label>
            <select id="hc-kvg-expense">
                <option value="0.15">Götürü Gider (%15)</option>
                <option value="real">Gerçek Gider (Belgeli)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcKiraVergisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kira-result">
            <div class="hc-result-item">
                <span>Mesken İstisnası:</span>
                <strong id="hc-kvg-res-exemp">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Vergi Matrahı:</span>
                <strong id="hc-kvg-res-matrah">-</strong>
            </div>
            <div class="hc-result-value" id="hc-kvg-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yıllık Ödenecek Kira Vergisi</p>
        </div>
    </div>
    <?php
}
