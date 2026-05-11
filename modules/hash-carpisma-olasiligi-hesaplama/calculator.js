function hcHashCollisionHesapla() {
    const n = parseFloat(document.getElementById('hc-hco-n').value);
    const bits = parseFloat(document.getElementById('hc-hco-bits').value);

    if (isNaN(n) || n <= 0) {
        alert('Lütfen geçerli bir giriş sayısı girin.');
        return;
    }

    // P ≈ 1 - exp(-n^2 / (2 * 2^bits))
    // we use log space to avoid overflow
    // exponent = -n^2 / 2^(bits + 1)
    // ln(P_not) = 2 * ln(n) - (bits + 1) * ln(2)
    const ln_n = Math.log(n);
    const ln_2 = Math.log(2);
    const log_exponent = 2 * ln_n - (bits + 1) * ln_2;
    const exponent = Math.exp(log_exponent);
    
    // P = 1 - exp(-exponent)
    // For very small x, 1 - exp(-x) ≈ x
    let p;
    if (exponent < 1e-15) {
        p = exponent;
    } else {
        p = 1 - Math.exp(-exponent);
    }

    let pStr = "";
    if (p < 1e-18) pStr = "Pratik olarak 0";
    else if (p < 0.000001) pStr = p.toExponential(4);
    else pStr = '%' + (p * 100).toLocaleString('tr-TR', { maximumFractionDigits: 6 });

    document.getElementById('hc-hco-res-val').innerText = pStr;
    
    let desc = "";
    if (p > 0.5) desc = "Dikkat: Çarpışma ihtimali %50'den yüksek!";
    else if (p > 0.01) desc = "Düşük ihtimal ancak mümkün.";
    else desc = "Çarpışma ihtimali son derece düşük.";

    document.getElementById('hc-hco-res-desc').innerText = desc;
    
    document.getElementById('hc-hco-result').classList.add('visible');
}
