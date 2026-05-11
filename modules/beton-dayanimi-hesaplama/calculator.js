function hcBetonDayanimHesapla() {
    const fck = parseFloat(document.getElementById('hc-bday-fck').value);
    const t = parseFloat(document.getElementById('hc-bday-gun').value);
    const s = parseFloat(document.getElementById('hc-bday-tip').value);

    if (isNaN(fck) || isNaN(t) || t <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // beta_cc(t) = exp(s * (1 - sqrt(28/t)))
    const betaCC = Math.exp(s * (1 - Math.sqrt(28 / t)));
    const fck_t = fck * betaCC;

    document.getElementById('hc-bday-res-val').innerText = fck_t.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' MPa';
    document.getElementById('hc-bday-res-percent').innerText = '28 günlük dayanımın %' + (betaCC * 100).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kadarı';
    
    document.getElementById('hc-bday-result').classList.add('visible');
}
