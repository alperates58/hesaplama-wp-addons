function hcVpnHizKaybiTahminiHesapla() {
    var hiz = parseFloat(document.getElementById('hc-vpn-hiz').value);
    var ping = parseFloat(document.getElementById('hc-vpn-ping').value);
    var protokol = document.getElementById('hc-vpn-protokol').value;
    var mesafe = document.getElementById('hc-vpn-mesafe').value;
    var cihaz = parseFloat(document.getElementById('hc-vpn-cihaz').value);

    if (isNaN(hiz) || hiz <= 0 || isNaN(ping) || ping <= 0) {
        alert('Lütfen geçerli hız ve ping değerleri girin.');
        return;
    }

    // Protokol bazlı hız kaybı
    var protLoss = 0.07; // wireguard
    if (protokol === 'openvpn-udp') protLoss = 0.15;
    else if (protokol === 'openvpn-tcp') protLoss = 0.30;
    else if (protokol === 'l2tp') protLoss = 0.20;

    // Mesafe bazlı hız kaybı (yönlendirme/routing overhead)
    var distLoss = 0.02; // yakin
    var pingAdd = 30;
    if (mesafe === 'orta') {
        distLoss = 0.08;
        pingAdd = 110;
    } else if (mesafe === 'uzak') {
        distLoss = 0.18;
        pingAdd = 250;
    }

    // Toplam kayıp oranı
    var toplamKayipOrani = protLoss + distLoss + cihaz;
    if (toplamKayipOrani > 0.90) toplamKayipOrani = 0.90; // maksimum %90 kayıpla sınırla

    var vpnHiz = hiz * (1 - toplamKayipOrani);
    var vpnPing = ping + pingAdd;

    var fmtSayi = function(val, dec) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: dec, maximumFractionDigits: dec });
    };

    document.getElementById('hc-vpn-res-hiz').textContent = fmtSayi(vpnHiz, 1) + ' Mbps';
    document.getElementById('hc-vpn-res-kayip').textContent = '%' + fmtSayi(toplamKayipOrani * 100, 1) + ' Hız Kaybı';
    document.getElementById('hc-vpn-res-ping').textContent = fmtSayi(vpnPing, 0) + ' ms';

    var yorum = '';
    if (vpnPing < 50) {
        yorum = 'Mükemmel Bağlantı: Gecikme süresi çok düşük. Online oyunlar, sesli/görüntülü aramalar ve canlı yayın izleme için tamamen sorunsuz.';
    } else if (vpnPing >= 50 && vpnPing < 150) {
        yorum = 'İyi Bağlantı: Günlük web gezintisi, sosyal medya ve 4K video akışları için idealdir. Online oyunlarda hafif gecikme hissedilebilir.';
    } else {
        yorum = 'Yüksek Gecikmeli Bağlantı: Sayfa yüklemelerinde hafif gecikmeler olabilir, online oyunlar için uygun değildir. Ancak dosya indirme ve video izleme yapılabilir.';
    }

    document.getElementById('hc-vpn-res-yorum').textContent = yorum;
    document.getElementById('hc-vpn-speed-result').classList.add('visible');
}
