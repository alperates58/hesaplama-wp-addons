function hcMalPaylasimiHesapla() {
    var konut = parseFloat(document.getElementById('hc-mp-konut').value) || 0;
    var arac = parseFloat(document.getElementById('hc-mp-arac').value) || 0;
    var nakit = parseFloat(document.getElementById('hc-mp-nakit').value) || 0;
    var borc = parseFloat(document.getElementById('hc-mp-borc').value) || 0;
    var katkiA = parseFloat(document.getElementById('hc-mp-katki-a').value) || 0;
    var katkiB = parseFloat(document.getElementById('hc-mp-katki-b').value) || 0;

    var brut = konut + arac + nakit;
    if (brut <= 0) {
        alert('Lütfen evlilik birliği içerisinde edinilen en az bir varlığın değerini giriniz.');
        return;
    }

    var indirimler = borc + katkiA + katkiB;
    var netDeger = brut - indirimler;
    
    // Artık değer sıfırdan küçük olamaz (borçlar paylaşılmaz, varlıktan düşülür)
    if (netDeger < 0) netDeger = 0;

    var yariPay = netDeger / 2;

    var payA = yariPay + katkiA;
    var payB = yariPay + katkiB;

    document.getElementById('hc-mp-res-brut').innerText = Math.round(brut).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-mp-res-indirim').innerText = Math.round(indirimler).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-mp-res-net').innerText = Math.round(netDeger).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-mp-res-pay-a').innerText = Math.round(payA).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-mp-res-pay-b').innerText = Math.round(payB).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-mp-result').classList.add('visible');
}