function hcIseIadeHesapla() {
    var brut = parseFloat(document.getElementById('hc-iit-brut').value) || 0;
    var net = parseFloat(document.getElementById('hc-iit-net').value) || 0;
    var tazminatAy = parseInt(document.getElementById('hc-iit-tazminat-ay').value) || 4;
    var bostaAy = parseInt(document.getElementById('hc-iit-bosta-ay').value) || 4;

    if (brut <= 0 || net <= 0) {
        alert('Lütfen brüt ve net maaş değerlerini giriniz.');
        return;
    }

    // İşe başlatmama tazminatı gelir vergisinden ve SGK primlerinden muaftır. Sadece damga vergisi (%0.759) kesilir.
    var baslatmamaBrut = brut * tazminatAy;
    var baslatmamaNet = baslatmamaBrut * (1.0 - 0.00759);

    // Boşta geçen süre ücreti normal çalışma gibidir. Net maaş üzerinden hesaplanır (SGK ve Gelir vergisi kesintileri normal maaş gibidir)
    var bostaNet = net * bostaAy;

    var toplam = baslatmamaNet + bostaNet;

    document.getElementById('hc-iit-res-baslatmama').innerText = Math.round(baslatmamaNet).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-iit-res-bosta').innerText = Math.round(bostaNet).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-iit-res-toplam').innerText = Math.round(toplam).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-iit-result').classList.add('visible');
}