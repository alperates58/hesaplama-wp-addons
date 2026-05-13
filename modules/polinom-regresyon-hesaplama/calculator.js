function hcPolinomRegresyonHesapla() {
    const dataText = document.getElementById('hc-poly-data').value.trim();
    const predictX = parseFloat(document.getElementById('hc-poly-predict-x').value);
    const resultDiv = document.getElementById('hc-polinom-regresyon-hesaplama-result');

    if (!dataText || isNaN(predictX)) {
        alert('Lütfen veri setini ve tahmin edilecek X değerini giriniz.');
        return;
    }

    const rows = dataText.split('\n');
    let xValues = [];
    let yValues = [];

    for (let row of rows) {
        const parts = row.split(/[,;\s\t]+/).filter(p => p.trim() !== '');
        if (parts.length >= 2) {
            const x = parseFloat(parts[0]);
            const y = parseFloat(parts[1]);
            if (!isNaN(x) && !isNaN(y)) {
                xValues.push(x);
                yValues.push(y);
            }
        }
    }

    const n = xValues.length;
    if (n < 3) {
        alert('2. derece regresyon için en az 3 veri çifti gereklidir.');
        return;
    }

    // Solve Ax = B for quadratic regression y = a + bx + cx^2
    // Matrix A is:
    // [ n      sumX    sumX2 ]
    // [ sumX   sumX2   sumX3 ]
    // [ sumX2  sumX3   sumX4 ]
    // B is:
    // [ sumY ]
    // [ sumXY ]
    // [ sumX2Y ]

    let sumX = 0, sumX2 = 0, sumX3 = 0, sumX4 = 0, sumY = 0, sumXY = 0, sumX2Y = 0;
    for (let i = 0; i < n; i++) {
        const x = xValues[i];
        const y = yValues[i];
        const x2 = x * x;
        sumX += x;
        sumX2 += x2;
        sumX3 += x2 * x;
        sumX4 += x2 * x2;
        sumY += y;
        sumXY += x * y;
        sumX2Y += x2 * y;
    }

    function det3x3(m) {
        return m[0][0] * (m[1][1] * m[2][2] - m[1][2] * m[2][1]) -
               m[0][1] * (m[1][0] * m[2][2] - m[1][2] * m[2][0]) +
               m[0][2] * (m[1][0] * m[2][1] - m[1][1] * m[2][0]);
    }

    const A = [
        [n, sumX, sumX2],
        [sumX, sumX2, sumX3],
        [sumX2, sumX3, sumX4]
    ];

    const detA = det3x3(A);
    if (Math.abs(detA) < 1e-10) {
        alert('Matris tekil. Lütfen farklı X değerleri giriniz.');
        return;
    }

    const B = [sumY, sumXY, sumX2Y];

    const A0 = [
        [B[0], A[0][1], A[0][2]],
        [B[1], A[1][1], A[1][2]],
        [B[2], A[2][1], A[2][2]]
    ];
    const A1 = [
        [A[0][0], B[0], A[0][2]],
        [A[1][0], B[1], A[1][2]],
        [A[2][0], B[2], A[2][2]]
    ];
    const A2 = [
        [A[0][0], A[0][1], B[0]],
        [A[1][0], A[1][1], B[1]],
        [A[2][0], A[2][1], B[2]]
    ];

    const a = det3x3(A0) / detA;
    const b = det3x3(A1) / detA;
    const c = det3x3(A2) / detA;

    const predictedY = a + b * predictX + c * Math.pow(predictX, 2);

    document.getElementById('hc-poly-formula-display').innerHTML = 
        `<strong>Denklem:</strong> ŷ = ${a.toLocaleString('tr-TR', {maximumFractionDigits: 4})} + (${b.toLocaleString('tr-TR', {maximumFractionDigits: 4})})x + (${c.toLocaleString('tr-TR', {maximumFractionDigits: 4})})x²`;
    
    document.getElementById('hc-poly-prediction-value').innerText = 
        `Tahmin Edilen Y: ${predictedY.toLocaleString('tr-TR', {maximumFractionDigits: 4})}`;

    resultDiv.classList.add('visible');
}
