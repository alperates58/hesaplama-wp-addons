function hcDeckOilHesapla() {
    const area = parseFloat(document.getElementById('hc-do-area').value);
    const coveragePerLiter = parseFloat(document.getElementById('hc-do-type').value);
    const coats = parseInt(document.getElementById('hc-do-coats').value || 1);

    if (!area) {
        alert('Lütfen alanı giriniz.');
        return;
    }

    const totalLiter = (area / coveragePerLiter) * coats;

    const resVal = document.getElementById('hc-do-res-val');
    resVal.innerText = totalLiter.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-deck-oil-result').classList.add('visible');
}
