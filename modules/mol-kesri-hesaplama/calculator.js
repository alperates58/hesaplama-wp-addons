function hcMolKesriHesapla() {
    const na = parseFloat(document.getElementById('hc-mol-a').value) || 0;
    const nb = parseFloat(document.getElementById('hc-mol-b').value) || 0;
    const nc = parseFloat(document.getElementById('hc-mol-c').value) || 0;

    if (na + nb + nc <= 0) {
        alert('Lütfen en az bir bileşen için geçerli mol sayısı giriniz.');
        return;
    }

    const nTotal = na + nb + nc;
    const xa = na / nTotal;
    const xb = nb / nTotal;
    const xc = nc / nTotal;

    document.getElementById('hc-res-xa').innerText = xa.toFixed(4);
    document.getElementById('hc-res-xb').innerText = xb.toFixed(4);
    
    if (nc > 0) {
        document.getElementById('hc-res-xc').innerText = xc.toFixed(4);
        document.getElementById('hc-res-row-c').style.display = 'flex';
    } else {
        document.getElementById('hc-res-row-c').style.display = 'none';
    }

    document.getElementById('hc-mol-kesri-result').classList.add('visible');
    document.getElementById('hc-mol-kesri-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
