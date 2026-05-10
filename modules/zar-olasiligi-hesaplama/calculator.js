function hcDiceProbHesapla() {
    const count = parseInt(document.getElementById('hc-dp-count').value);
    const target = parseInt(document.getElementById('hc-dp-target').value);

    if (isNaN(target)) { alert('Lütfen bir hedef giriniz.'); return; }

    let prob = 0;
    if (count === 1) {
        if (target >= 1 && target <= 6) prob = 1/6;
    } else {
        // 2 Dice combinations
        let combos = 0;
        for (let i = 1; i <= 6; i++) {
            for (let j = 1; j <= 6; j++) {
                if (i + j === target) combos++;
            }
        }
        prob = combos / 36;
    }

    const pct = prob * 100;

    document.getElementById('hc-dp-res-val').innerText = `% ${pct.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-zar-olasiligi-result').classList.add('visible');
}
