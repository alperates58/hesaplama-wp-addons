function hcEfsHesapla() {
    const km = parseFloat(document.getElementById('hc-efs-km').value);
    const iceCons = parseFloat(document.getElementById('hc-efs-ice-cons').value);
    const evCons = parseFloat(document.getElementById('hc-efs-ev-cons').value);
    const icePrice = parseFloat(document.getElementById('hc-efs-ice-price').value);
    const evPrice = parseFloat(document.getElementById('hc-efs-ev-price').value);

    if (isNaN(km) || isNaN(icePrice) || isNaN(evPrice)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    const iceMonthly = (km / 100) * iceCons * icePrice;
    const evMonthly = (km / 100) * evCons * evPrice;
    const monthlySaving = iceMonthly - evMonthly;

    document.getElementById('hc-efs-monthly').innerText = monthlySaving.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + " ₺";
    document.getElementById('hc-efs-annual').innerText = (monthlySaving * 12).toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + " ₺";

    document.getElementById('hc-efs-result').classList.add('visible');
}
