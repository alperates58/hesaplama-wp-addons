function hcHataPayiHesapla() {
    const n = parseInt(document.getElementById('hc-moe-n').value);
    const z = parseFloat(document.getElementById('hc-moe-conf').value);
    const pPercent = parseFloat(document.getElementById('hc-moe-p').value);
    const resultDiv = document.getElementById('hc-ornekleme-hatasi-hesaplama-result');

    if (isNaN(n) || n <= 0 || isNaN(pPercent) || pPercent < 0 || pPercent > 100) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const p = pPercent / 100;
    // Formula: MOE = Z * sqrt(p*(1-p)/n)
    const moe = z * Math.sqrt((p * (1 - p)) / n);
    const moePercent = moe * 100;

    document.getElementById('hc-moe-res-value').innerText = `± %${moePercent.toLocaleString('tr-TR', {maximumFractionDigits: 2})}`;
    document.getElementById('hc-moe-res-desc').innerText = `${n} kişilik bir örneklemde, %${pPercent} beklenen oran için hata payı yaklaşık olarak %${moePercent.toLocaleString('tr-TR', {maximumFractionDigits: 2})} düzeyindedir.`;

    resultDiv.classList.add('visible');
}
