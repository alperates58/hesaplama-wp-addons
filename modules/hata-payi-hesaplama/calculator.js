function hcMarginErrorHesapla() {
    const n = parseFloat(document.getElementById('hc-me-pop').value);
    const z = parseFloat(document.getElementById('hc-me-conf').value);

    if (!n || n <= 0) {
        alert('Lütfen geçerli bir örneklem büyüklüğü giriniz.');
        return;
    }

    // Formula for margin of error (standard 50% distribution for max error)
    // MOE = z * sqrt(p*(1-p)/n) where p = 0.5
    const moe = z * Math.sqrt(0.25 / n) * 100;

    document.getElementById('hc-me-res-val').innerText = `± % ${moe.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    document.getElementById('hc-margin-error-result').classList.add('visible');
}
