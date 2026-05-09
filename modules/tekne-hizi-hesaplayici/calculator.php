<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tekne_hizi_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-tekne-hizi-hesaplayici',
        HC_PLUGIN_URL . 'modules/tekne-hizi-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tekne-hizi-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/tekne-hizi-hesaplayici/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tekne-hizi-hesaplayici">
        <div class="hc-header">
            <h3>Tekne Hızı Hesaplayıcı</h3>
            <p>Teknenizin gövde hızını (Hull Speed) hesaplayın ve denizcilik birimleri arasında dönüşüm yapın.</p>
        </div>
        
        <div class="hc-tabs">
            <button class="hc-tab-btn active" onclick="hcBoatTab('hull')">Gövde Hızı</button>
            <button class="hc-tab-btn" onclick="hcBoatTab('conv')">Birim Dönüştürücü</button>
        </div>

        <div id="hc-boat-hull" class="hc-tab-content active">
            <div class="hc-form-group">
                <label for="hc-waterline">Su Hattı Boyu (LWL)</label>
                <div class="hc-dual-input">
                    <input type="number" id="hc-lwl-val" placeholder="Değer" value="30">
                    <select id="hc-lwl-unit">
                        <option value="ft">Feet (ft)</option>
                        <option value="m">Metre (m)</option>
                    </select>
                </div>
                <small>Deplasman tekneleri için teorik maksimum hız.</small>
            </div>
            <button class="hc-btn" onclick="hcCalcHullSpeed()">Hızı Hesapla</button>
        </div>

        <div id="hc-boat-conv" class="hc-tab-content">
            <div class="hc-form-group">
                <label for="hc-speed-input">Hız Değeri</label>
                <div class="hc-dual-input">
                    <input type="number" id="hc-speed-val" placeholder="Değer" value="10">
                    <select id="hc-speed-unit">
                        <option value="knots">Knot</option>
                        <option value="kmh">km/h</option>
                        <option value="mph">mph</option>
                    </select>
                </div>
            </div>
            <button class="hc-btn" onclick="hcConvertBoatSpeed()">Dönüştür</button>
        </div>

        <div class="hc-result" id="hc-boat-result">
            <div class="hc-result-header">Hesaplama Sonucu</div>
            <div class="hc-boat-res-grid">
                <div class="hc-boat-card">
                    <strong id="hc-res-knots">0.0</strong>
                    <span>Knot</span>
                </div>
                <div class="hc-boat-card">
                    <strong id="hc-res-kmh">0.0</strong>
                    <span>km/h</span>
                </div>
                <div class="hc-boat-card">
                    <strong id="hc-res-mph">0.0</strong>
                    <span>mph</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
