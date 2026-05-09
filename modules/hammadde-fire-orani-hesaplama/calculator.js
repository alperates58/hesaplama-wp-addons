function hcHFHesapla() {
    const giren = parseFloat(document.getElementById('hc-hf-in').value);
    const cikan = parseFloat(document.getElementById('hc-hf-out').value);

    if (isNaN(giren) || isNaN(cikan)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (giren <= 0) {
        alert('Giren miktar 0 olamaz.');
        return;
    }

    const firePerc = ((giren - cikan) / giren) * 100;
    const yieldPerc = (cikan / giren) * 100;

    document.getElementById('hc-hf-perc').innerText = '%' + firePerc.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-hf-yield').innerText = '%' + yieldPerc.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-hf-result').classList.add('visible');
}
