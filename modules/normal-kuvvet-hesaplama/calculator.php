<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_normal_kuvvet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-normal-kuvvet-hesaplama',
        HC_PLUGIN_URL . 'modules/normal-kuvvet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-normal-kuvvet-hesaplama-css',
        HC_PLUGIN_URL . 'modules/normal-kuvvet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-normal-force">
        <h3>Normal Kuvvet Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-nf-surface">Zemin/Yüzey Yapısı</label>
            <select id="hc-nf-surface" onchange="hcNfSurfaceChange()">
                <option value="horizontal">Yatay Düzlem</option>
                <option value="inclined">Eğik Düzlem</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-nf-mass">Cismin Kütlesi (m - kg)</label>
            <input type="number" id="hc-nf-mass" placeholder="Örn: 10" value="10">
        </div>

        <div class="hc-form-group" id="hc-nf-angle-group" style="display: none;">
            <label for="hc-nf-angle">Eğik Düzlem Eğimi (&theta; - Derece)</label>
            <input type="number" id="hc-nf-angle" placeholder="Örn: 30" value="30">
        </div>

        <div class="hc-form-group">
            <label for="hc-nf-external">Ek Dış Dikey Kuvvet (F_dış - Newton)</label>
            <input type="number" id="hc-nf-external" placeholder="Örn: 0 (Aşağı basan pozitif, çeken negatif)" value="0">
            <span style="font-size: 11px; color: var(--hc-front-muted);">Cisme dik olarak aşağı bastıran kuvvet (+) veya yukarı çeken kuvvet (-).</span>
        </div>

        <button class="hc-btn" onclick="hcNormalKuvvetHesapla()">Normal Kuvveti Hesapla</button>

        <div class="hc-result" id="hc-normal-kuvvet-result">
            <div class="hc-result-label">Yüzeyin Tepki Kuvveti (Normal Kuvvet - FN):</div>
            <div class="hc-result-value" id="hc-nf-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Yerçekimi Etkisi (m &times; g):</strong></td>
                            <td id="hc-nf-gravity-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Maksimum Statik Sürtünme Sınırı (&mu; = 0.3 ise):</strong></td>
                            <td id="hc-nf-friction-limit-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
