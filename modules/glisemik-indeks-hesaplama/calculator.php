<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_glisemik_indeks_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gi-list',
        HC_PLUGIN_URL . 'modules/glisemik-indeks-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gi-search">
        <h3>Gıdaların Glisemik İndeksi (GI)</h3>
        
        <div class="hc-form-group">
            <label for="hc-gi-query">Gıda Ara</label>
            <input type="text" id="hc-gi-query" placeholder="Örn: Elma, Ekmek, Pirinç..." onkeyup="hcGISearch()">
        </div>

        <div id="hc-gi-list-container" style="max-height: 400px; overflow-y: auto; margin-top: 20px; border: 1px solid #eee; border-radius: 8px;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="position: sticky; top: 0; background: #f8f8f8; z-index: 1;">
                    <tr>
                        <th style="padding: 10px; border-bottom: 1px solid #eee; text-align: left;">Gıda</th>
                        <th style="padding: 10px; border-bottom: 1px solid #eee; text-align: right;">GI</th>
                        <th style="padding: 10px; border-bottom: 1px solid #eee; text-align: center;">Tip</th>
                    </tr>
                </thead>
                <tbody id="hc-gi-tbody">
                    <!-- JS ile doldurulacak -->
                </tbody>
            </table>
        </div>

        <div style="margin-top: 15px; display: flex; gap: 10px; font-size: 0.85em;">
            <span style="color:#2e7d32;">● Düşük (0-55)</span>
            <span style="color:#ef6c00;">● Orta (56-69)</span>
            <span style="color:#c62828;">● Yüksek (70+)</span>
        </div>
    </div>
    <?php
}
