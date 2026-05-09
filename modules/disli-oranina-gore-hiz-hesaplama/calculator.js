function hcDOHHesapla() {
    const rpmIn = parseFloat(document.getElementById('hc-do-rpmin').value);
    const teethIn = parseInt(document.getElementById('hc-do-tin').value);
    const teethOut = parseInt(document.getElementById('hc-do-tout').value);

    if (isNaN(rpmIn) || isNaN(teethIn) || isNaN(teethOut) || teethOut <= 0 || teethIn <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const ratio = teethOut / teethIn;
    const rpmOut = rpmIn * (teethIn / teethOut);

    document.getElementById('hc-do-ratio').innerText = ratio.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ':1';
    document.getElementById('hc-do-rpmout').innerText = Math.round(rpmOut).toLocaleString('tr-TR') + ' RPM';
    
    document.getElementById('hc-do-result').classList.add('visible');
}
