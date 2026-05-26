function hcKriptoAthDususHesapla() {
    var ath = parseFloat(document.getElementById('hc-kad-ath').value) || 0;
    var guncel = parseFloat(document.getElementById('hc-kad-guncel').value) || 0;

    if (ath <= 0 || guncel <= 0) {
        alert('Lütfen geçerli ATH ve güncel fiyat değerleri giriniz.');
        return;
    }

    if (guncel > ath) {
        alert('Güncel fiyat ATH fiyatından yüksek olamaz. Lütfen değerleri kontrol ediniz.');
        return;
    }

    var dususYuzde = ((ath - guncel) / ath) * 100;
    var artisGerekli = ((ath - guncel) / guncel) * 100;
    var fark = ath - guncel;

    document.getElementById('hc-kad-res-dusus').innerText = '-%' + dususYuzde.toFixed(2);
    document.getElementById('hc-kad-res-artis').innerText = '+%' + artisGerekli.toFixed(2);
    document.getElementById('hc-kad-res-fark').innerText = fark.toLocaleString('tr-TR', {maximumFractionDigits: 4});

    document.getElementById('hc-kad-result').classList.add('visible');
}