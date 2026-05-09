<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sigara_paket_yili( $atts ) {
    wp_enqueue_script(
        'hc-sigara-paket-yili',
        HC_PLUGIN_URL . 'modules/sigara-paket-yili/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sigara-paket-yili-css',
        HC_PLUGIN_URL . 'modules/sigara-paket-yili/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sigara-paket-yili">
        <h3>Sigara Paket Yılı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-spy-adet">Günde Kaç Adet Sigara İçiyorsunuz?</label>
            <input type="number" id="hc-spy-adet" placeholder="Örn: 20" min="1" step="1">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-spy-yil">Kaç Yıldır Sigara İçiyorsunuz?</label>
            <input type="number" id="hc-spy-yil" placeholder="Örn: 10" min="0" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcSigaraPaketYiliHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sigara-paket-yili-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted); margin-bottom: 5px;">Toplam Paket Yılı Değeri</span>
                <span class="hc-result-value" id="hc-spy-res-deger">0</span>
                <span style="display: block; font-size: 16px; font-weight: 600; margin-top: 10px;" id="hc-spy-res-yorum"></span>
            </div>
            
            <div style="margin-top: 20px; padding: 15px; background: rgba(21, 94, 239, 0.05); border-radius: 12px; font-size: 13px; line-height: 1.5;">
                <strong>Paket Yılı Nedir?</strong><br>
                Paket yılı, tıp dünyasında sigara maruziyetini ölçmek için kullanılan bir birimdir. Günde içilen paket sayısı ile içilen yıl sayısının çarpımı ile bulunur. 1 paket = 20 sigara olarak kabul edilir.
            </div>
        </div>
    </div>
    <?php
}
