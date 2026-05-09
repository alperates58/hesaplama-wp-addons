function hcGubreMiktariHesapla() {
    const area = parseFloat(document.getElementById('hc-fert-area').value);
    const need = parseFloat(document.getElementById('hc-fert-need').value);
    const percent = parseFloat(document.getElementById('hc-fert-percent').value);

    if (isNaN(area) || isNaN(need) || isNaN(percent) || area <= 0 || need <= 0 || percent <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const totalFert = (need * area) / (percent / 100);

    document.getElementById('hc-fert-val').innerText = totalFert.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    document.getElementById('hc-fert-note').innerText = `Dekar başına ${Math.round(totalFert / area).toLocaleString('tr-TR')} kg gübre uygulamalısınız.`;
    document.getElementById('hc-fert-result').classList.add('visible');
}
