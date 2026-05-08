function hcDbcHesapla() {
    const diff = parseFloat(document.getElementById('hc-dbc-diff').value) || 0;
    const km = parseFloat(document.getElementById('hc-dbc-km').value);
    const pCons = parseFloat(document.getElementById('hc-dbc-p-cons').value);
    const dCons = parseFloat(document.getElementById('hc-dbc-d-cons').value);
    const pPrice = parseFloat(document.getElementById('hc-dbc-p-price').value);
    const dPrice = parseFloat(document.getElementById('hc-dbc-d-price').value);

    if (isNaN(km) || isNaN(pCons) || isNaN(dCons) || isNaN(pPrice) || isNaN(dPrice)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    const yPetrol = (km / 100) * pCons * pPrice;
    const yDiesel = (km / 100) * dCons * dPrice;
    const saving = yPetrol - yDiesel;

    document.getElementById('hc-dbc-saving').innerText = Math.round(saving).toLocaleString('tr-TR') + " ₺ / Yıl";
    
    if (saving > 0 && diff > 0) {
        const years = (diff / saving).toFixed(1);
        document.getElementById('hc-dbc-payback').innerText = years + " Yıl";
    } else {
        document.getElementById('hc-dbc-payback').innerText = "Tasarruf Yok";
    }

    document.getElementById('hc-dbc-result').classList.add('visible');
}
