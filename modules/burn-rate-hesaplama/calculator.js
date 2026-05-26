function hcBurnRateHesapla() {
    var baslangic = parseFloat(document.getElementById('hc-br-baslangic').value) || 0;
    var bitis = parseFloat(document.getElementById('hc-br-bitis').value) || 0;
    var ay = parseFloat(document.getElementById('hc-br-ay').value) || 1;
    var brutAylik = parseFloat(document.getElementById('hc-br-brut-aylik').value) || 0;

    if (baslangic <= 0 || ay <= 0) {
        alert('Lütfen geçerli dönem başlangıç bakiyesi ve ay süresi giriniz.');
        return;
    }

    var toplamAzalis = baslangic - bitis;
    var netBurn = toplamAzalis / ay;
    var brutBurn = brutAylik > 0 ? brutAylik : netBurn; // Brüt gider girilmediyse net gider gösterilir

    document.getElementById('hc-br-res-toplam-azalis').innerText = toplamAzalis.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    
    var netBurnEl = document.getElementById('hc-br-res-net-burn');
    netBurnEl.innerText = (netBurn >= 0 ? '' : '-') + Math.abs(netBurn).toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    netBurnEl.style.color = netBurn >= 0 ? 'var(--hc-front-red)' : 'var(--hc-front-green)'; // Nakit artmışsa yeşil

    document.getElementById('hc-br-res-brut-burn').innerText = brutBurn.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-br-result').classList.add('visible');
}