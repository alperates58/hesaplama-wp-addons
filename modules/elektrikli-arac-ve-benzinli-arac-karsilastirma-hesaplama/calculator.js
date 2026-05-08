function hcEvcHesapla() {
    const km = parseFloat(document.getElementById('hc-evc-km').value);
    
    const iceCons = parseFloat(document.getElementById('hc-evc-ice-cons').value);
    const icePrice = parseFloat(document.getElementById('hc-evc-ice-price').value);
    
    const evCons = parseFloat(document.getElementById('hc-evc-ev-cons').value);
    const evPrice = parseFloat(document.getElementById('hc-evc-ev-price').value);

    if (isNaN(km) || isNaN(icePrice) || isNaN(evPrice)) {
        alert('Lütfen fiyatları girin.');
        return;
    }

    const iceAnnual = (km / 100) * iceCons * icePrice;
    const evAnnual = (km / 100) * evCons * evPrice;
    const saving = iceAnnual - evAnnual;

    document.getElementById('hc-evc-ice-total').innerText = iceAnnual.toLocaleString('tr-TR') + " ₺";
    document.getElementById('hc-evc-ev-total').innerText = evAnnual.toLocaleString('tr-TR') + " ₺";
    
    const savingEl = document.getElementById('hc-evc-saving');
    if (saving > 0) {
        savingEl.innerText = "Yıllık Tasarruf: " + saving.toLocaleString('tr-TR') + " ₺";
    } else {
        savingEl.innerText = "Yıllık Ek Maliyet: " + Math.abs(saving).toLocaleString('tr-TR') + " ₺";
        savingEl.style.color = "red";
    }

    document.getElementById('hc-evc-result').classList.add('visible');
}
