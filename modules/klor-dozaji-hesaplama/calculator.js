function hcChlorineDoseHesapla() {
    const vol = parseFloat(document.getElementById('hc-cd-vol').value);
    const dose = parseFloat(document.getElementById('hc-cd-dose').value);
    const purity = parseFloat(document.getElementById('hc-cd-purity').value);

    if (isNaN(vol) || isNaN(dose) || isNaN(purity) || vol < 0 || purity <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // 1 m3 = 1000 L. 
    // Dose mg/L * Vol L = Total mg
    const totalMg = dose * (vol * 1000);
    const totalGram = (totalMg / 1000) / (purity / 100);

    document.getElementById('hc-cd-res-val').innerText = totalGram.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' gram';
    
    document.getElementById('hc-cd-result').classList.add('visible');
}
