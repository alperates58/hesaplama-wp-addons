function hcSchoolCostHesapla() {
    const s = parseFloat(document.getElementById('hc-sc-stationery').value) || 0;
    const u = parseFloat(document.getElementById('hc-sc-uniform').value) || 0;
    const sh = parseFloat(document.getElementById('hc-sc-shoes').value) || 0;
    const b = parseFloat(document.getElementById('hc-sc-books').value) || 0;

    const total = s + u + sh + b;

    document.getElementById('hc-res-sc-total').innerText = total.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    document.getElementById('hc-school-cost-result').classList.add('visible');
}
