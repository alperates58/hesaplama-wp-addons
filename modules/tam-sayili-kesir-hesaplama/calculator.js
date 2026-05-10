function hcMixedFracHesapla() {
    const w1 = parseInt(document.getElementById('hc-mf1-w').value) || 0;
    const n1 = parseInt(document.getElementById('hc-mf1-n').value) || 0;
    const d1 = parseInt(document.getElementById('hc-mf1-d').value) || 1;
    
    const w2 = parseInt(document.getElementById('hc-mf2-w').value) || 0;
    const n2 = parseInt(document.getElementById('hc-mf2-n').value) || 0;
    const d2 = parseInt(document.getElementById('hc-mf2-d').value) || 1;
    
    const op = document.getElementById('hc-mf-op').value;

    if (d1 === 0 || d2 === 0) { alert('Payda 0 olamaz.'); return; }

    // Convert to improper: (w * d) + n
    let num1 = (Math.abs(w1) * d1 + n1) * (w1 < 0 ? -1 : 1);
    let den1 = d1;
    let num2 = (Math.abs(w2) * d2 + n2) * (w2 < 0 ? -1 : 1);
    let den2 = d2;

    let resNum, resDen;

    if (op === '+') {
        resNum = num1 * den2 + num2 * den1;
        resDen = den1 * den2;
    } else if (op === '-') {
        resNum = num1 * den2 - num2 * den1;
        resDen = den1 * den2;
    } else if (op === '*') {
        resNum = num1 * num2;
        resDen = den1 * den2;
    } else {
        if (num2 === 0) { alert('Sıfıra bölme hatası.'); return; }
        resNum = num1 * den2;
        resDen = den1 * num2;
    }

    function gcd(a, b) {
        return b ? gcd(b, a % b) : a;
    }

    const common = Math.abs(gcd(resNum, resDen));
    resNum /= common;
    resDen /= common;

    if (resDen < 0) { resNum *= -1; resDen *= -1; }

    let resultStr = '';
    if (Math.abs(resNum) >= resDen && resDen !== 1) {
        let whole = Math.trunc(resNum / resDen);
        let rem = Math.abs(resNum % resDen);
        resultStr = `${whole} ${rem}/${resDen}`;
    } else if (resDen === 1) {
        resultStr = resNum.toString();
    } else {
        resultStr = `${resNum}/${resDen}`;
    }

    document.getElementById('hc-mf-res-val').innerText = resultStr;
    document.getElementById('hc-mixed-result').classList.add('visible');
}
