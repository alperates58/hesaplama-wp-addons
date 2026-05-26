function hcRoamingHesapla() {
    var paket = parseFloat(document.getElementById('hc-rrc-paket').value) || 0;
    var gun = parseInt(document.getElementById('hc-rrc-gun').value) || 0;
    var dakika = parseFloat(document.getElementById('hc-rrc-dakika').value) || 0;
    var dataMb = parseFloat(document.getElementById('hc-rrc-data').value) || 0;

    if (gun < 0) {
        alert('Lütfen seyahat süresini giriniz.');
        return;
    }

    var paketTop = paket * gun;
    
    // Paket dışı standart aramalar dakika başı ~ 15 TL, data MB başı ~ 2.5 TL
    var aramaAsimi = dakika * 15;
    var dataAsimi = dataMb * 2.5;

    var asimToplam = aramaAsimi + dataAsimi;
    var toplam = paketTop + asimToplam;

    document.getElementById('hc-rrc-res-paket').innerText = paketTop.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
    document.getElementById('hc-rrc-res-asim').innerText = asimToplam.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
    document.getElementById('hc-rrc-res-toplam').innerText = toplam.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';

    document.getElementById('hc-rrc-result').classList.add('visible');
}