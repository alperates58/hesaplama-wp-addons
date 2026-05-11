function hcDisliDevirHesapla() {
    const rpmIn = parseFloat(document.getElementById('hc-dod-giris-rpm').value);
    const nIn = parseFloat(document.getElementById('hc-dod-giris-dis').value);
    const nOut = parseFloat(document.getElementById('hc-dod-cikis-dis').value);

    if (isNaN(rpmIn) || isNaN(nIn) || isNaN(nOut) || nOut <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // RPM_out = RPM_in * (N_in / N_out)
    const rpmOut = rpmIn * (nIn / nOut);
    const torkOrani = nOut / nIn; // Tork devirle ters orantılıdır

    document.getElementById('hc-dod-res-rpm').innerText = Math.round(rpmOut).toLocaleString('tr-TR') + ' RPM';
    document.getElementById('hc-dod-res-tork').innerText = 'Tork Değişimi: ' + torkOrani.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + 'x kat';
    
    document.getElementById('hc-dod-result').classList.add('visible');
}
