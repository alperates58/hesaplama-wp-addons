function hcErrHesapla() {
    const theoretical = parseFloat(document.getElementById('hc-err-the').value);
    const experimental = parseFloat(document.getElementById('hc-err-exp').value);

    if (isNaN(theoretical) || isNaN(experimental) || theoretical === 0) {
        alert('Lütfen geçerli değerler giriniz. Teorik değer 0 olamaz.');
        return;
    }

    const error = (Math.abs(theoretical - experimental) / Math.abs(theoretical)) * 100;

    document.getElementById('hc-res-err-val').innerText = error.toLocaleString('tr-TR', { 
        maximumFractionDigits: 4 
    });

    document.getElementById('hc-err-result').classList.add('visible');
    document.getElementById('hc-err-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
