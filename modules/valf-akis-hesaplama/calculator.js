function hcValveFlowHesapla() {
    const cv = parseFloat(document.getElementById('hc-vf-cv').value) || 0;
    const dp = parseFloat(document.getElementById('hc-vf-dp').value) || 0;
    const sg = parseFloat(document.getElementById('hc-vf-sg').value) || 1;

    if (sg <= 0) return;

    // Q = Cv * sqrt(dP / SG)
    const q = cv * Math.sqrt(dp / sg);

    document.getElementById('hc-res-vf-val').innerText = q.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' GPM';
    document.getElementById('hc-valve-flow-result').classList.add('visible');
}
