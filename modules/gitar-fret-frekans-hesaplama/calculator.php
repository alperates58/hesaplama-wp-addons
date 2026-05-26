<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gitar_fret_frekans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-guitar-fret',
        HC_PLUGIN_URL . 'modules/gitar-fret-frekans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-guitar-fret-css',
        HC_PLUGIN_URL . 'modules/gitar-fret-frekans-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gitar-fret-frekans-hesaplama">
        <h3>Gitar Fret Frekans Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gff-skala">Skala Uzunluğu (Scale Length - mm)</label>
            <input type="number" id="hc-gff-skala" placeholder="Örn: 648 (Fender standart)" step="any" min="0" value="648">
        </div>
        <div class="hc-form-group">
            <label for="hc-gff-fret-sayisi">Toplam Fret Sayısı</label>
            <input type="number" id="hc-gff-fret-sayisi" placeholder="Örn: 22" min="1" max="36" value="22">
        </div>
        <div class="hc-form-group">
            <label for="hc-gff-frekans">Boş Tel Frekansı (Hz)</label>
            <select id="hc-gff-frekans">
                <option value="82.41">Kalın E (E2) - Standart Düzen (82.41 Hz)</option>
                <option value="110.00">A (A2) - Standart Düzen (110.00 Hz)</option>
                <option value="146.83">D (D3) - Standart Düzen (146.83 Hz)</option>
                <option value="196.00">G (G3) - Standart Düzen (196.00 Hz)</option>
                <option value="246.94">B (B3) - Standart Düzen (246.94 Hz)</option>
                <option value="329.63" selected>İnce E (E4) - Standart Düzen (329.63 Hz)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcGitarFretHesapla()">Fret Haritasını Hesapla</button>
        <div class="hc-result" id="hc-gff-result">
            <h4>Hesaplanan Fret Haritası:</h4>
            <div style="overflow-x:auto;">
                <table style="font-size:13px;">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Fret No</th>
                            <th style="text-align:right;">Eşikten (Nut) Uzaklık (mm)</th>
                            <th style="text-align:right;">Fret Genişliği (mm)</th>
                            <th style="text-align:right;">Frekans (Hz)</th>
                        </tr>
                    </thead>
                    <tbody id="hc-gff-table-body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}