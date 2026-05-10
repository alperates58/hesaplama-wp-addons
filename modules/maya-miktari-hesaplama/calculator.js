function hcYeastAmountHesapla() {
    const flour = parseFloat(document.getElementById('hc-yeast-flour').value);
    const pct = parseFloat(document.getElementById('hc-yeast-type').value);

    if (isNaN(flour) || flour <= 0) {
        alert('Lütfen un miktarını giriniz.');
        return;
    }

    const yeast = (flour * pct) / 100;

    document.getElementById('hc-yeast-val').innerText = yeast.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    document.getElementById('hc-yeast-info').innerText = 'Not: Oda sıcaklığı ve mayalanma süresine göre miktar %25-50 oranında azaltılıp artırılabilir.';
    
    document.getElementById('hc-yeast-result').classList.add('visible');
}
