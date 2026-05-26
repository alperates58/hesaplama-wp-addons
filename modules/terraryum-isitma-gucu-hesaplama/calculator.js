function hcTerraryumIsiHesapla() {
    var hacim = parseFloat(document.getElementById('hc-tih-hacim').value) || 0;
    var oda = parseFloat(document.getElementById('hc-tih-oda').value) || 0;
    var hedef = parseFloat(document.getElementById('hc-tih-hedef').value) || 0;
    var malzeme = document.getElementById('hc-tih-malzeme').value;

    if (hacim <= 0 || hedef <= oda) {
        alert('Lütfen geçerli terraryum hacmi ve hedeften küçük bir oda sıcaklığı giriniz.');
        return;
    }

    var fark = hedef - oda;
    var katsayi = malzeme === 'cam' ? 0.20 : 0.12;
    var guc = fark * hacim * katsayi;

    // Minimum 10 Watt güvenlik sınırıyla
    if (guc < 10) guc = 10;

    var ekipman = '';
    if (guc >= 100) {
        ekipman = '1 adet Seramik Isıtıcı Lamba + 1 adet Isı Matı';
    } else if (guc >= 50) {
        ekipman = '1 adet 50W-75W Seramik Lamba veya Isı Ampulü';
    } else {
        ekipman = '1 adet Düşük Wattlı Isı Matı veya Gece Lambası';
    }

    document.getElementById('hc-tih-res-fark').innerText = fark.toFixed(1) + ' °C';
    document.getElementById('hc-tih-res-guc').innerText = Math.round(guc) + ' Watt';
    document.getElementById('hc-tih-res-ekipman').innerText = ekipman;

    document.getElementById('hc-tih-result').classList.add('visible');
}