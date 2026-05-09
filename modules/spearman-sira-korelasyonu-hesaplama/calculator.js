function hcSpearmanHesapla() {
    const xRaw = document.getElementById('hc-sp-x').value.split(',').map(x => parseFloat(x.trim())).filter(x => !isNaN(x));
    const yRaw = document.getElementById('hc-sp-y').value.split(',').map(y => parseFloat(y.trim())).filter(y => !isNaN(y));

    if (xRaw.length !== yRaw.length || xRaw.length < 2) {
        alert('Veri sayıları eşit ve en az 2 olmalıdır.');
        return;
    }

    function getRanks(arr) {
        const sorted = [...arr].sort((a, b) => a - b);
        return arr.map(v => {
            const firstIdx = sorted.indexOf(v);
            const lastIdx = sorted.lastIndexOf(v);
            return (firstIdx + lastIdx) / 2 + 1;
        });
    }

    const xRanks = getRanks(xRaw);
    const yRanks = getRanks(yRaw);
    const n = xRaw.length;

    let dSquaredSum = 0;
    for (let i = 0; i < n; i++) {
        dSquaredSum += Math.pow(xRanks[i] - yRanks[i], 2);
    }

    const rho = 1 - (6 * dSquaredSum) / (n * (Math.pow(n, 2) - 1));

    document.getElementById('hc-res-sp-val').innerText = rho.toFixed(4);
    
    const interpretation = document.getElementById('hc-sp-interpret');
    if (rho > 0.7) interpretation.innerText = "Güçlü Pozitif İlişki";
    else if (rho < -0.7) interpretation.innerText = "Güçlü Negatif İlişki";
    else if (Math.abs(rho) < 0.3) interpretation.innerText = "Zayıf İlişki";
    else interpretation.innerText = "Orta Derece İlişki";

    document.getElementById('hc-spearman-result').classList.add('visible');
}
