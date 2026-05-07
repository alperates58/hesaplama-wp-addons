<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_gelisim_takibi( $atts ) {
    wp_enqueue_script(
        'hc-bebek-takip',
        HC_PLUGIN_URL . 'modules/bebek-gelisim-takibi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bebek-takip-css',
        HC_PLUGIN_URL . 'modules/bebek-gelisim-takibi/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bebek-takip">
        <h3>Bebek Gelişim Takibi</h3>
        
        <div class="hc-form-group">
            <label for="hc-bt-tip">Hangi Değeri Takip Etmek İstiyorsunuz?</label>
            <select id="hc-bt-tip">
                <option value="kilo">Kilo (kg)</option>
                <option value="boy">Boy (cm)</option>
                <option value="bas">Baş Çevresi (cm)</option>
            </select>
        </div>

        <div class="hc-form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group">
                <label>Eski Ölçüm Tarihi</label>
                <input type="date" id="hc-bt-tarih1">
            </div>
            <div class="hc-form-group">
                <label>Yeni Ölçüm Tarihi</label>
                <input type="date" id="hc-bt-tarih2" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>

        <div class="hc-form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group">
                <label>Eski Ölçüm Değeri</label>
                <input type="number" id="hc-bt-val1" step="0.01">
            </div>
            <div class="hc-form-group">
                <label>Yeni Ölçüm Değeri</label>
                <input type="number" id="hc-bt-val2" step="0.01">
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcBebekTakipHesapla()">Gelişimi Hesapla</button>
        
        <div class="hc-result" id="hc-bebek-gelisim-takibi-result">
            <div class="hc-growth-summary">
                <div class="hc-growth-main">
                    <span id="hc-res-bt-fark">+0.00</span>
                    <small id="hc-res-bt-birim">kg</small>
                </div>
                <div class="hc-growth-sub">
                    <span id="hc-res-bt-sure">0 Gün</span> içerisinde sağlanan gelişim
                </div>
            </div>

            <div id="hc-bt-hiz-box" style="margin-top: 15px; padding: 12px; background: #f8fafc; border-radius: 10px; text-align: center; font-size: 14px;">
                Günlük Ortalama Artış: <strong id="hc-res-bt-gunluk">0</strong>
            </div>

            <div id="hc-bt-yorum" style="margin-top: 15px; font-size: 14px; line-height: 1.5;">
            </div>
        </div>
    </div>
    <?php
}
