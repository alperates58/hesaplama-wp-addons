<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kirinim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kirinim-hesaplama',
        HC_PLUGIN_URL . 'modules/kirinim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kirinim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kirinim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kirinim">
        <h3>Kırınım ve Girişim Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kirinim-type">Deney Tipi</label>
            <select id="hc-kirinim-type" onchange="hcKirinimTipiDegis()">
                <option value="tek">Tek Yarıkta Kırınım (Saçak Genişliği)</option>
                <option value="cift">Çift Yarıkta Girişim (Young Deneyi)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-kirinim-dalga">Işık Dalga Boyu (&lambda; - nm)</label>
            <input type="number" id="hc-kirinim-dalga" placeholder="Örn: 632.8 (Helyum-Neon Lazeri)" value="632.8">
        </div>

        <div class="hc-form-group">
            <label for="hc-kirinim-genislik" id="hc-kirinim-genislik-label">Yarık Genişliği (w - mm)</label>
            <input type="number" id="hc-kirinim-genislik" placeholder="Örn: 0.1" value="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-kirinim-ekran">Ekran Uzaklığı (L - m)</label>
            <input type="number" id="hc-kirinim-ekran" placeholder="Örn: 1.5" value="1.5">
        </div>

        <button class="hc-btn" onclick="hcKirinimHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-kirinim-result">
            <div class="hc-result-label">Merkezi Saçak Genişliği (&Delta;x):</div>
            <div class="hc-result-value" id="hc-kirinim-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <thead>
                        <tr>
                            <th>Saçak Sırası (m)</th>
                            <th>Karanlık Saçak Açısı (&theta;)</th>
                            <th>Ekranda Merkezden Uzaklık (y)</th>
                        </tr>
                    </thead>
                    <tbody id="hc-kirinim-table-body">
                        <!-- JS ile doldurulacak -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
