function hcHbcHesapla() {
    const diff = parseFloat(document.getElementById('hc-hbc-diff').value) || 0;
    const km = parseFloat(document.getElementById('hc-hbc-km').value);
    const pCons = parseFloat(document.getElementById('hc-hbc-p-cons').value);
    const hCons = parseFloat(document.getElementById('hc-hbc-h-cons').value);
    const price = parseFloat(document.getElementById('hc-hbc-price').value);

    if (isNaN(km) || isNaN(pCons) || isNaN(hCons) || isNaN(price)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    const yPetrol = (km / 100) * pCons * price;
    const yHybrid = (km / 100) * hCons * price;
    const saving = yPetrol - yHybrid;

    document.getElementById('hc-hbc-saving').innerText = Math.round(saving).toLocaleString('tr-TR') + " ₺ / Yıl";
    
    if (saving > 0 && diff > 0) {
        const years = (diff / saving).toFixed(1);
        document.getElementById('hc-hbc-payback').innerText = years + " Yıl";
    } else {
        document.getElementById('hc-hbc-payback').innerText = "Tasarruf Yok";
    }

    document.getElementById('hc-hbc-result').classList.add('visible');
}
