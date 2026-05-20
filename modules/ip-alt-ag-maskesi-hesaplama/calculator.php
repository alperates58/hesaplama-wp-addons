<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ip_alt_ag_maskesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ip-alt-ag-maskesi-hesaplama',
        HC_PLUGIN_URL . 'modules/ip-alt-ag-maskesi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-subnet-calc">
        <h3>IP Alt Ağ Maskesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sub-ip">IP Adresi</label>
            <input type="text" id="hc-sub-ip" value="192.168.1.1" placeholder="örn: 192.168.1.1" />
        </div>

        <div class="hc-form-group">
            <label for="hc-sub-cidr">Alt Ağ Maskesi (CIDR Öneki)</label>
            <select id="hc-sub-cidr">
                <?php for($i=32; $i>=1; $i--): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($i === 24) ? 'selected' : ''; ?>>
                        /<?php echo $i; ?> — (<?php 
                            // Render decimal subnet representation for convenience
                            $mask = (0xffffffff << (32 - $i)) & 0xffffffff;
                            $o1 = ($mask >> 24) & 0xff;
                            $o2 = ($mask >> 16) & 0xff;
                            $o3 = ($mask >> 8) & 0xff;
                            $o4 = $mask & 0xff;
                            echo "$o1.$o2.$o3.$o4";
                        ?>)
                    </option>
                <?php endfor; ?>
            </select>
        </div>

        <button class="hc-btn" onclick="hcIpAltAgMaskesiHesapla()">Alt Ağ Bilgilerini Hesapla</button>

        <div class="hc-result" id="hc-subnet-result">
            <table>
                <tr>
                    <td>IP Sınıfı (Class)</td>
                    <td><strong id="hc-sub-res-class">-</strong></td>
                </tr>
                <tr>
                    <td>Alt Ağ Maskesi (Subnet Mask)</td>
                    <td><strong id="hc-sub-res-mask">-</strong></td>
                </tr>
                <tr>
                    <td>Ağ Adresi (Network Address)</td>
                    <td><strong id="hc-sub-res-net" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
                <tr>
                    <td>Broadcast Adresi</td>
                    <td><strong id="hc-sub-res-broad" style="color: var(--hc-front-red);">-</strong></td>
                </tr>
                <tr>
                    <td>Kullanılabilir IP Aralığı</td>
                    <td><strong id="hc-sub-res-range" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Toplam Kullanılabilir Host Sayısı</td>
                    <td><strong class="hc-result-value" id="hc-sub-res-hosts" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>IP İkilik (Binary) Gösterimi</td>
                    <td><code id="hc-sub-res-binary" style="font-size:12px; word-break:break-all;">-</code></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
