function hcLtsHesapla() {
    const km = parseFloat(document.getElementById('hc-lts-km').value);
    const pCons = parseFloat(document.getElementById('hc-lts-cons').value);
    const pPrice = parseFloat(document.getElementById('hc-lts-p-price').value);
    const lPrice = parseFloat(document.getElementById('hc-lts-l-price').value);
    const cost = parseFloat(document.getElementById('hc-lts-cost').value) || 0;

    if (isNaN(km) || isNaN(pCons) || isNaN(pPrice) || isNaN(lPrice)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    const lCons = pCons * 1.2;
    const mPetrol = (km / 100) * pCons * pPrice;
    const mLpg = (km / 100) * lCons * lPrice;
    const saving = mPetrol - mLpg;

    document.getElementById('hc-lts-monthly').innerText = Math.round(saving).toLocaleString('tr-TR') + " ₺";
    
    if (saving > 0 && cost > 0) {
        const months = Math.ceil(cost / saving);
        document.getElementById('hc-lts-payback').innerText = months + " Ay";
    } else {
        document.getElementById('hc-lts-payback').innerText = "-";
    }

    document.getElementById('hc-lts-result').classList.add('visible');
}
