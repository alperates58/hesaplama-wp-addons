function hcOrProbToggle() {
    const type = document.getElementById('hc-op-type').value;
    document.getElementById('hc-op-inter-group').style.display = (type === 'custom') ? 'block' : 'none';
}

function hcOrProbHesapla() {
    const pa = (parseFloat(document.getElementById('hc-op-pa').value) || 0) / 100;
    const pb = (parseFloat(document.getElementById('hc-op-pb').value) || 0) / 100;
    const type = document.getElementById('hc-op-type').value;

    let pi = 0;
    if (type === 'independent') {
        pi = pa * pb;
    } else if (type === 'custom') {
        pi = (parseFloat(document.getElementById('hc-op-pi').value) || 0) / 100;
    }

    const pOr = pa + pb - pi;
    const finalProb = Math.min(100, Math.max(0, pOr * 100));

    document.getElementById('hc-res-op-val').innerText = '%' + finalProb.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-or-prob-result').classList.add('visible');
}
