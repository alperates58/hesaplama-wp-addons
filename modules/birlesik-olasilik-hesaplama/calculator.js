function hcJointProbHesapla() {
    const input = document.getElementById('hc-jp-probs').value;
    const probs = input.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n));

    if (probs.length < 2) {
        alert('Lütfen en az iki olasılık değeri girin.');
        return;
    }

    if (probs.some(p => p < 0 || p > 1)) {
        alert('Olasılık değerleri 0 ile 1 arasında olmalıdır.');
        return;
    }

    const jointProb = probs.reduce((acc, p) => acc * p, 1);

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    const percent = (val) => '%' + (val * 100).toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-res-jp-val').innerText = `${fmt(jointProb)} (${percent(jointProb)})`;
    document.getElementById('hc-birlesik-olasilik-hesaplama-result').classList.add('visible');
}
