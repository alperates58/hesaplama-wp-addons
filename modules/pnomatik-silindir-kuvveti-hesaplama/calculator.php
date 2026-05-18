<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pnomatik_silindir_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pnomatik-silindir-kuvveti-hesaplama',
        HC_PLUGIN_URL . 'modules/pnomatik-silindir-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pnomatik-silindir-kuvveti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/pnomatik-silindir-kuvveti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pneumatic">
        <h3>Pnömatik Silindir Kuvveti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pn-piston">Piston Çapı (D - mm)</label>
            <input type="number" id="hc-pn-piston" placeholder="Örn: 50" value="50">
        </div>

        <div class="hc-form-group">
            <label for="hc-pn-rod">Mil (Rot) Çapı (d - mm)</label>
            <input type="number" id="hc-pn-rod" placeholder="Örn: 20" value="20">
            <span style="font-size: 11px; color: var(--hc-front-muted);">Geri yönde havanın bastığı alanı azaltır.</span>
        </div>

        <div class="hc-form-group">
            <label for="hc-pn-pressure">Hava Çalışma Basıncı (Bar)</label>
            <input type="number" id="hc-pn-pressure" placeholder="Örn: 6" value="6" step="0.1">
            <span style="font-size: 11px; color: var(--hc-front-muted);">Genel fabrika şebekesi: 6 - 8 Bar</span>
        </div>

        <div class="hc-form-group">
            <label for="hc-pn-efficiency">Silindir Verimliliği (%)</label>
            <input type="number" id="hc-pn-efficiency" placeholder="Örn: 85" value="85" min="1" max="100">
            <span style="font-size: 11px; color: var(--hc-front-muted);">Sürtünme kayıpları için genelde %80-%90 arası alınır.</span>
        </div>

        <button class="hc-btn" onclick="hcPnömatikSilindirKuvvetiHesapla()">Kuvvetleri Hesapla</button>

        <div class="hc-result" id="hc-pnomatik-silindir-kuvveti-result">
            <div class="hc-result-label">Teorik ve Pratik Kuvvetler:</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <thead>
                        <tr>
                            <th>Yön / Tip</th>
                            <th>Teorik Kuvvet (N)</th>
                            <th>Pratik Kuvvet (N - Verimli)</th>
                            <th>Pratik Kuvvet (kgf)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>İleri Yön (İtme):</strong></td>
                            <td id="hc-pn-f-push-theo">-</td>
                            <td id="hc-pn-f-push-prac" style="color: var(--hc-primary); font-weight: bold;">-</td>
                            <td id="hc-pn-f-push-kgf">-</td>
                        </tr>
                        <tr>
                            <td><strong>Geri Yön (Çekme):</strong></td>
                            <td id="hc-pn-f-pull-theo">-</td>
                            <td id="hc-pn-f-pull-prac" style="color: var(--hc-primary); font-weight: bold;">-</td>
                            <td id="hc-pn-f-pull-kgf">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
