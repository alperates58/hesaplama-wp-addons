function hcHpaFazDegistir() {
    const faz = document.getElementById('hc-hpa-faz').value;
    document.getElementById('hc-hpa-ac-params').style.display = faz === 'dc' ? 'none' : 'block';
}

function hcHpAmpereHesapla() {
    const hp = parseFloat(document.getElementById('hc-hpa-hp').value);
    const volt = parseFloat(document.getElementById('hc-hpa-volt').value);
    const faz = document.getElementById('hc-hpa-faz').value;
    const verim = parseFloat(document.getElementById('hc-hpa-verim').value) / 100;
    const pf = parseFloat(document.getElementById('hc-hpa-pf').value) || 1;

    if (isNaN(hp) || isNaN(volt) || isNaN(verim) || volt <= 0 || verim <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const watt = hp * 746;
    let amper = 0;

    if (faz === '1') {
        // I = W / (V * PF * Eff)
        amper = watt / (volt * pf * verim);
    } else if (faz === '3') {
        // I = W / (V * PF * Eff * sqrt(3))
        amper = watt / (volt * pf * verim * Math.sqrt(3));
    } else {
        // DC: I = W / (V * Eff)
        amper = watt / (volt * verim);
    }

    document.getElementById('hc-hpa-res-amp').innerText = amper.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Amper';
    
    document.getElementById('hc-hpa-result').classList.add('visible');
}
