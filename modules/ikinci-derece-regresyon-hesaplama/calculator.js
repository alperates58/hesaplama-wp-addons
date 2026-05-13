function hcQuadraticRegressionHesapla() {
    const xInput = document.getElementById('hc-quad-x').value;
    const yInput = document.getElementById('hc-quad-y').value;

    const parse = (input) => input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n));
    const x = parse(xInput);
    const y = parse(yInput);

    if (x.length < 3 || y.length < 3) {
        alert('İkinci derece regresyon için en az 3 veri noktası girmelisiniz.');
        return;
    }

    if (x.length !== y.length) {
        alert('X ve Y veri setlerinin boyutları aynı olmalıdır.');
        return;
    }

    const n = x.length;
    let sumX = 0, sumX2 = 0, sumX3 = 0, sumX4 = 0;
    let sumY = 0, sumXY = 0, sumX2Y = 0;

    for (let i = 0; i < n; i++) {
        const xi = x[i];
        const yi = y[i];
        const xi2 = xi * xi;
        sumX += xi;
        sumX2 += xi2;
        sumX3 += xi2 * xi;
        sumX4 += xi2 * xi2;
        sumY += yi;
        sumXY += xi * yi;
        sumX2Y += xi2 * yi;
    }

    // Solving the system of linear equations:
    // a*sumX4 + b*sumX3 + c*sumX2 = sumX2Y
    // a*sumX3 + b*sumX2 + c*sumX  = sumXY
    // a*sumX2 + b*sumX  + c*n     = sumY

    const matrix = [
        [sumX4, sumX3, sumX2, sumX2Y],
        [sumX3, sumX2, sumX, sumXY],
        [sumX2, sumX, n, sumY]
    ];

    const solve = (m) => {
        const n = m.length;
        for (let i = 0; i < n; i++) {
            let max = i;
            for (let j = i + 1; j < n; j++) {
                if (Math.abs(m[j][i]) > Math.abs(m[max][i])) max = j;
            }
            [m[i], m[max]] = [m[max], m[i]];
            for (let j = i + 1; j < n; j++) {
                const f = m[j][i] / m[i][i];
                for (let k = i; k <= n; k++) m[j][k] -= f * m[i][k];
            }
        }
        const res = new Array(n);
        for (let i = n - 1; i >= 0; i--) {
            let s = 0;
            for (let j = i + 1; j < n; j++) s += m[i][j] * res[j];
            res[i] = (m[i][n] - s) / m[i][i];
        }
        return res;
    };

    const [a, b, c] = solve(matrix);

    // R2 Calculation
    const yMean = sumY / n;
    let ssTot = 0, ssRes = 0;
    for (let i = 0; i < n; i++) {
        const yi = y[i];
        const fi = a * x[i] * x[i] + b * x[i] + c;
        ssTot += Math.pow(yi - yMean, 2);
        ssRes += Math.pow(yi - fi, 2);
    }
    const r2 = 1 - (ssRes / ssTot);

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    const fmtSign = (val) => (val >= 0 ? "+ " + fmt(val) : "- " + fmt(Math.abs(val)));

    document.getElementById('hc-res-quad-a').innerText = fmt(a);
    document.getElementById('hc-res-quad-b').innerText = fmt(b);
    document.getElementById('hc-res-quad-c').innerText = fmt(c);
    document.getElementById('hc-res-quad-r2').innerText = fmt(r2);

    document.getElementById('hc-res-quad-eq').innerText = `y = ${fmt(a)}x² ${fmtSign(b)}x ${fmtSign(c)}`;
    document.getElementById('hc-ikinci-derece-regresyon-result').classList.add('visible');
}
