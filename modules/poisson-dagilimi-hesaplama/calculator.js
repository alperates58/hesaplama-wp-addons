function hcPoissonHesapla() {
    const lambda = parseFloat(document.getElementById('hc-poisson-lambda').value);
    const k = parseInt(document.getElementById('hc-poisson-k').value);
    const resultDiv = document.getElementById('hc-poisson-dagilimi-hesaplama-result');

    if (isNaN(lambda) || isNaN(k) || lambda <= 0 || k < 0) {
        alert('Lütfen geçerli değerler giriniz (λ > 0, k ≥ 0).');
        return;
    }

    function factorial(n) {
        if (n === 0 || n === 1) return 1;
        let res = 1;
        for (let i = 2; i <= n; i++) res *= i;
        return res;
    }

    function poissonPDF(lam, x) {
        return (Math.pow(lam, x) * Math.exp(-lam)) / factorial(x);
    }

    const pExact = poissonPDF(lambda, k);
    
    let pLessEqual = 0;
    for (let i = 0; i <= k; i++) {
        pLessEqual += poissonPDF(lambda, i);
    }

    const pGreater = 1 - pLessEqual;

    document.getElementById('hc-poisson-exact').innerHTML = `Tam olarak ${k} olay olasılığı P(X = ${k}): <strong>%${(pExact * 100).toLocaleString('tr-TR', {maximumFractionDigits: 4})}</strong>`;
    document.getElementById('hc-poisson-less-equal').innerHTML = `${k} veya daha az olay olasılığı P(X ≤ ${k}): <strong>%${(pLessEqual * 100).toLocaleString('tr-TR', {maximumFractionDigits: 4})}</strong>`;
    document.getElementById('hc-poisson-greater').innerHTML = `${k}'dan fazla olay olasılığı P(X > ${k}): <strong>%${(pGreater * 100).toLocaleString('tr-TR', {maximumFractionDigits: 4})}</strong>`;

    resultDiv.classList.add('visible');
}
