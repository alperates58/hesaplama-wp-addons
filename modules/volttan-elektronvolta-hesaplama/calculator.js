function hcVoltToEVHesapla() {
    const v = parseFloat(document.getElementById('hc-ve-v').value) || 0;
    const q = parseFloat(document.getElementById('hc-ve-q').value) || 1;
    const eCharge = 1.602176634e-19;

    const ev = v * q;
    const joule = ev * eCharge;

    document.getElementById('hc-res-ve-val').innerText = ev.toLocaleString('tr-TR') + ' eV';
    document.getElementById('hc-res-ve-joule').innerText = joule.toExponential(4) + ' J';
    
    document.getElementById('hc-volt-to-ev-result').classList.add('visible');
}
