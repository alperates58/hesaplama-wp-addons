<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ip_alt_ag_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ip-subnet',
        HC_PLUGIN_URL . 'modules/ip-alt-ag-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ip-subnet">
        <h3>IP Alt Ağ (Subnet) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>IP Adresi</label>
            <input type="text" id="hc-is-ip" placeholder="Örn: 192.168.1.1">
        </div>
        
        <div class="hc-form-group">
            <label>Alt Ağ Maskesi (CIDR)</label>
            <select id="hc-is-cidr">
                <?php for($i=32; $i>=1; $i--): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($i==24?'selected':''); ?>>/<?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcIpSubnetHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-is-result">
            <span>Ağ Bilgileri:</span>
            <div id="hc-is-res-list" style="margin-top:10px; font-size:0.95em;">
                <div style="display: flex; justify-content: space-between; padding:5px 0; border-bottom:1px solid #eee;">
                    <span>Ağ Adresi:</span>
                    <strong id="hc-is-res-net">-</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding:5px 0; border-bottom:1px solid #eee;">
                    <span>Yayın (Broadcast) Adresi:</span>
                    <strong id="hc-is-res-broad">-</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding:5px 0; border-bottom:1px solid #eee;">
                    <span>Kullanılabilir Host:</span>
                    <strong id="hc-is-res-hosts">-</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding:5px 0;">
                    <span>Alt Ağ Maskesi:</span>
                    <strong id="hc-is-res-mask">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
