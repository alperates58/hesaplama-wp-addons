<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rydberg_denklemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rydberg-denklemi-hesaplama',
        HC_PLUGIN_URL . 'modules/rydberg-denklemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rydberg-denklemi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/rydberg-denklemi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rydberg">
        <h3>Rydberg Denklemi (Atomik Spektrum)</h3>
        
        <div class="hc-form-group">
            <label for="hc-ry-z">Atom Numarası / Çekirdek Yükü (Z)</label>
            <input type="number" id="hc-ry-z" placeholder="Standart Hidrojen: 1" value="1" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ry-n1">Alt Enerji Seviyesi (n1)</label>
            <input type="number" id="hc-ry-n1" placeholder="Örn: 2" value="2" min="1">
            <span style="font-size: 11px; color: var(--hc-front-muted);">n1 = 2: Balmer Serisi (Görünür Işık) | n1 = 1: Lyman Serisi (UV)</span>
        </div>

        <div class="hc-form-group">
            <label for="hc-ry-n2">Üst Enerji Seviyesi (n2)</label>
            <input type="number" id="hc-ry-n2" placeholder="Örn: 3" value="3" min="2">
            <span style="font-size: 11px; color: var(--hc-front-muted);">Her zaman n2 > n1 olmalıdır.</span>
        </div>

        <button class="hc-btn" onclick="hcRydbergDenklemiHesapla()">Spektral Çizgiyi Hesapla</button>

        <div class="hc-result" id="hc-rydberg-denklemi-result">
            <div class="hc-result-label">Yayılan Işığın Dalga Boyu (&lambda;):</div>
            <div class="hc-result-value" id="hc-ry-lambda-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Spektral Bölge:</strong></td>
                            <td id="hc-ry-region-val" style="color: var(--hc-primary); font-weight: bold;">-</td>
                        </tr>
                        <tr>
                            <td><strong>Foton Enerjisi (E):</strong></td>
                            <td id="hc-ry-energy-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Dalga Sayısı (1/&lambda;):</strong></td>
                            <td id="hc-ry-wavenum-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
