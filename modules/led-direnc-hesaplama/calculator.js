function hcLedResHesapla() {
    const vs = parseFloat(document.getElementById('hc-lr-vs').value);
    const vf = parseFloat(document.getElementById('hc-lr-vf').value);
    const ifMa = parseFloat(document.getElementById('hc-lr-if').value);

    if (isNaN(vs) || isNaN(vf) || isNaN(ifMa) || ifMa <= 0 || vs <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    if (vf >= vs) {
        alert('LED gerilimi besleme geriliminden küçük olmalıdır.');
        return;
    }

    const ifA = ifMa / 1000;
    
    // R = (Vs - Vf) / If
    const r = (vs - vf) / ifA;
    
    // P = (Vs - Vf) * If
    const p = (vs - vf) * ifA;

    document.getElementById('hc-lr-res-val').innerText = Math.round(r).toLocaleString('tr-TR') + ' Ω';
    document.getElementById('hc-lr-res-p').innerText = p.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Watt';
    
    document.getElementById('hc-lr-result').classList.add('visible');
}
