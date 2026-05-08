<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_birikim_plani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-savings-plan',
        HC_PLUGIN_URL . 'modules/birikim-plani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-savings-plan-css',
        HC_PLUGIN_URL . 'modules/birikim-plani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-savings-plan">
        <h3>Detaylı Birikim Planı</h3>
        
        <div class="hc-form-group">
            <label for="hc-sp-initial">Başlangıç Tutarı (TL)</label>
            <input type="number" id="hc-sp-initial" value="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-sp-monthly">Aylık Birikim (TL)</label>
            <input type="number" id="hc-sp-monthly" value="5000">
        </div>

        <div class="hc-form-group">
            <label for="hc-sp-rate">Yıllık Getiri (%)</label>
            <input type="number" id="hc-sp-rate" value="45" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-sp-years">Süre (Yıl)</label>
            <input type="number" id="hc-sp-years" value="1" max="50">
        </div>
        
        <button class="hc-btn" onclick="hcSavingsPlanHesapla()">Planı Oluştur</button>
        
        <div class="hc-result" id="hc-savings-plan-result">
            <div id="hc-sp-table-container" style="overflow-x:auto; margin-top:20px;">
                <table class="hc-table">
                    <thead>
                        <tr>
                            <th>Ay</th>
                            <th>Yatırılan</th>
                            <th>Faiz Getirisi</th>
                            <th>Toplam Bakiye</th>
                        </tr>
                    </thead>
                    <tbody id="hc-sp-tbody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
