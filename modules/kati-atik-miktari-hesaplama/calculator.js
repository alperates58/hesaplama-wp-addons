function hcSolidWasteHesapla() {
    const count = parseFloat(document.getElementById('hc-sw-count').value);
    const days = parseFloat(document.getElementById('hc-sw-days').value);
    const rate = parseFloat(document.getElementById('hc-sw-type').value);

    if (isNaN(count) || isNaN(days) || count <= 0 || days <= 0) {
        alert('Lütfen geçerli sayı ve gün değerleri girin.');
        return;
    }

    const totalKg = count * days * rate;
    const totalTon = totalKg / 1000;

    document.getElementById('hc-sw-res-val').innerText = totalKg.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg';
    document.getElementById('hc-sw-res-ton').innerText = totalTon.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Ton';
    
    document.getElementById('hc-sw-result').classList.add('visible');
}
