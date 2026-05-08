function hcStokDevirHesapla() {
    const cogs = parseFloat(document.getElementById('hc-sdh-cogs').value) || 0;
    const avgInv = parseFloat(document.getElementById('hc-sdh-avg-inv').value) || 0;

    if (cogs <= 0 || avgInv <= 0) {
        alert('Lütfen SMM ve ortalama stok değerlerini giriniz.');
        return;
    }

    const ratio = cogs / avgInv;
    const days = 365 / ratio;

    document.getElementById('hc-sdh-res-days').innerText = Math.round(days) + ' Gün';
    document.getElementById('hc-sdh-res-ratio').innerText = ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-stok-devir-result').classList.add('visible');
}
